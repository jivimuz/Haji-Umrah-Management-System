<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Agen;
use App\Models\Jamaah;
use App\Models\Module;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('menu');
    }

    public function menu(Request $request)
    {
        $AccessList = explode(',', auth()->user()->access);
        $menu = $request->menu;
        $menuList = Module::when($menu, function ($query) use ($menu) {
            return $query->where('name', 'like', "%$menu%");
        })->whereIn('id', $AccessList)->whereNotIn('route', ['', '#'])->where('isactive', true)->orderBy('group_id')->orderBy('list_no')->get();
        // dd($menuList);
        return view('layout/menuList', compact('menuList'));
    }

    public function getJamaahUmrahInYear()
    {
        $jl = [];
        $jp = [];
        $tt = [];

        $cjl = 0;
        $cjp = 0;

        $earn = Payment::select(DB::raw('COALESCE(SUM(nominal), 0) as total'))->whereNull('void_by')->first()->total;


        for ($i = 1; $i <= 12; $i++) {
            $cek = Jamaah::select(DB::raw('count(m_paket.id) as total'))
                ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
                ->where('gender', 'L')
                ->where('m_paket.type', 'Umrah')
                ->whereMonth('t_jamaah.created_at', sprintf('%02s', $i))
                ->whereYear('t_jamaah.created_at', date('Y'))
                ->first();

            array_push($jl, ($cek ? $cek->total : 0));
            $cjl += ($cek ? $cek->total : 0);
        }
        for ($i = 1; $i <= 12; $i++) {
            $cek = Jamaah::select(DB::raw('count(m_paket.id) as total'))
                ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
                ->where('gender', 'P')
                ->where('m_paket.type', 'Umrah')
                ->whereMonth('t_jamaah.created_at', sprintf('%02s', $i))
                ->whereYear('t_jamaah.created_at', date('Y'))
                ->first();
            array_push($jp, ($cek ? $cek->total : 0));
            $cjp += ($cek ? $cek->total : 0);
        }
        for ($i = 0; $i < 12; $i++) {
            $cek = $jp[$i] > $jl[$i] ? $jp[$i] : $jl[$i];
            array_push($tt, $cek);
        }

        return response()->json(["message" => 'success', 'jp' => $jp, 'jl' => $jl, 'tt' => $tt, 'cjl' => $cjl, 'cjp' => $cjp, 'earn' => $earn], 200);
    }
    public function getJamaahHajiInYear()
    {
        $jl = [];
        $jp = [];
        $tt = [];

        $cjl = 0;
        $cjp = 0;


        for ($i = 1; $i <= 12; $i++) {
            $cek = Jamaah::select(DB::raw('count(m_paket.id) as total'))
                ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
                ->where('gender', 'L')
                ->where('m_paket.type', 'Haji')
                ->whereMonth('t_jamaah.created_at', sprintf('%02s', $i))
                ->whereYear('t_jamaah.created_at', date('Y'))
                ->first();

            array_push($jl, ($cek ? $cek->total : 0));
            $cjl += ($cek ? $cek->total : 0);
        }
        for ($i = 1; $i <= 12; $i++) {
            $cek = Jamaah::select(DB::raw('count(m_paket.id) as total'))
                ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
                ->where('gender', 'P')
                ->where('m_paket.type', 'Haji')
                ->whereMonth('t_jamaah.created_at', sprintf('%02s', $i))
                ->whereYear('t_jamaah.created_at', date('Y'))
                ->first();
            array_push($jp, ($cek ? $cek->total : 0));
            $cjp += ($cek ? $cek->total : 0);
        }
        for ($i = 0; $i < 12; $i++) {
            $cek = $jp[$i] > $jl[$i] ? $jp[$i] : $jl[$i];
            array_push($tt, $cek);
        }

        return response()->json(["message" => 'success', 'jp' => $jp, 'jl' => $jl, 'tt' => $tt, 'cjl' => $cjl, 'cjp' => $cjp], 200);
    }

    public function getTopAgen(Request $request)
    {
        $monthYear = $request->month;
        list($year, $month) = explode('-', $monthYear);
        $data = Agen::select([
            'm_agen.*',
            DB::raw("(SELECT COALESCE(COUNT(id), 0) as tjamaah FROM t_jamaah where t_jamaah.agen_id = m_agen.id and month(t_jamaah.created_at) = '$month' and year(t_jamaah.created_at) = '$year') as tjamaah")
        ])
            ->havingRaw('tjamaah > 0')
            ->orderBy('tjamaah', 'desc')->get(5);

        $income = Payment::select(DB::raw('COALESCE(SUM(nominal), 0) as total'))->where('nominal', '>=', 0)->whereYear('paid_at', $year)->whereNull('void_by')
            ->whereMonth('paid_at', $month)->first()->total;

        $expense = Payment::select(DB::raw('COALESCE(SUM(nominal), 0) as total'))->where('nominal', '<=', 0)->whereYear('paid_at', $year)->whereNull('void_by')
            ->whereMonth('paid_at', $month)->first()->total;

        $total = Payment::select(DB::raw('COALESCE(SUM(nominal), 0) as total'))->whereYear('paid_at', $year)->whereNull('void_by')
            ->whereMonth('paid_at', $month)->first()->total;

        return response()->json(["message" => 'success', 'data' => $data, 'income' => $income, 'expense' => $expense, 'total' => $total], 200);
    }

    public function get40Days()
    {
        $data = Jamaah::select([
            't_jamaah.nama',
            'm_paket.type',
            'm_paket.flight_date as tgl',
            DB::raw("COALESCE(m_paket.publish_price,0) as price"),
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as paid FROM t_payment where t_payment.jamaah_id = t_jamaah.id and t_payment.void_by IS NULL) as paid")
        ])
            ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->whereBetween('m_paket.flight_date', [
                Carbon::now()->startOfDay(),
                Carbon::now()->addDays(40)->endOfDay()
            ])
            ->orderBy('m_paket.flight_date', 'asc')->get();
        return response()->json(["message" => 'success', 'data' => $data], 200);
    }
}
