<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Jamaah;
use App\Models\MorePayment;
use App\Models\Paket;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        return view('pages/payment/index');
    }

    public function getList(Request $request)
    {
        $monthYear = $request->month; // '2024-08'
        list($year, $month) = explode('-', $monthYear);

        $data = Payment::select(['t_payment.*', 't_jamaah.nama as jamaah', 'm_paket.nama as paket'])
            ->leftJoin('t_jamaah', 't_jamaah.id', 't_payment.jamaah_id')
            ->leftJoin('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->whereYear('paid_at', $year)
            ->whereMonth('paid_at', $month)
            ->orderBy('id', 'desc')->get();
        return response()->json(["message" => 'success', 'data' => $data], 200);
    }

    public function add()
    {
        $jamaah = Jamaah::select([
            't_jamaah.*',
            'm_paket.nama as paket',
            'm_paket.publish_price',
            'm_paket.flight_date',
            'm_program.nama as program',
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as paid FROM t_payment where t_payment.jamaah_id = t_jamaah.id) as paid"),
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as total FROM t_morepayment where t_morepayment.jamaah_id = t_jamaah.id) as morepayment")
        ])
            ->join('m_paket', 't_jamaah.paket_id', 'm_paket.id')
            ->join('m_program', 'm_paket.program_id', 'm_program.id')
            ->where('t_jamaah.is_done', false)->get();
        return view('pages/payment/add', compact('jamaah'));
    }

    public function outTransaction()
    {
        return view('pages/payment/tabs-out');
    }

    public function pengeluaran()
    {
        return view('pages/payment/tabs/pengeluaran');
    }

    public function refund()
    {
        $jamaah = Jamaah::where('is_firstpaid', true)->get();
        return view('pages/payment/tabs/refund', compact('jamaah'));
    }

    public function getJamaahHistory(Request $request)
    {
        $history = Payment::select(['t_payment.*', 't_jamaah.nama as jamaah', 'm_paket.nama as paket'])
            ->join('t_jamaah', 't_jamaah.id', 't_payment.jamaah_id')
            ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->where('t_jamaah.id', $request->id)
            ->orderBy('id', 'desc')->get();
        $paidCheck = Payment::select(DB::raw('COALESCE(SUM(nominal), 0) as paid'))->where('jamaah_id', $request->id)->first()->paid;

        return response()->json(["message" => 'success', 'data' => $history, 'paid' => $paidCheck], 200);
    }

    public function saveData(Request $request)
    {
        $check = Jamaah::where('id', $request->jamaah_id)->first();
        $insert = false;
        if ($request->is_refund == 1) {
            $insert = Payment::insert([
                'jamaah_id' => $request->jamaah_id,
                'jamaah_name' => $request->jamaah_name,
                'nominal' => (0 - $request->nominal),
                'remark' => $request->remark,
                'paid_at' => Carbon::now(),
                'void_at' => Carbon::now(),
                'void_by' => auth()->user()->id,
            ]);
        } else {
            $insert = Payment::insert([
                'jamaah_id' => $request->jamaah_id,
                'jamaah_name' => $request->jamaah_name,
                'nominal' => $request->nominal,
                'remark' => $request->remark,
                'paid_at' => Carbon::now(),
                'void_at' => null,
                'void_by' => null,
            ]);
        }

        if ($insert) {
            if ($check) {
                $priceCheck = Paket::select(DB::raw('COALESCE(publish_price, 0) AS price'))->where('id', $check->paket_id)->first();
                $paidCheck = Payment::select(DB::raw('COALESCE(SUM(nominal), 0) as paid'))->where('jamaah_id', $request->jamaah_id)->first();
                $morePaymentCheck = MorePayment::select(DB::raw('COALESCE(SUM(nominal), 0) as total'))->where('jamaah_id', $request->jamaah_id)->first();
                $is_done = false;
                $donepaid_date = null;


                if ($paidCheck->paid >= (($priceCheck->price + $morePaymentCheck->total) - $check->discount)) {
                    $is_done = true;
                    $donepaid_date = Carbon::now();
                }
                Jamaah::where('id', $request->jamaah_id)->update([
                    'is_firstpaid' => true,
                    'is_done' => $is_done,
                    'firstpaid_date' => $check->firstpaid_date ?: Carbon::now(),
                    'donepaid_date' =>  $donepaid_date,
                ]);
            }
            return response()->json(["message" => 'success', 'data' => $insert], 200);
        }

        return response()->json(["error" => 'Gagal input'], 400);
    }
}
