<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Jamaah;
use App\Models\Paket;
use App\Models\Payment;
use App\Models\Setting;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintController extends Controller
{
    public function kwitansi($id)
    {
        $decodedId = base64_decode($id);

        if ($decodedId === false) {
            echo "Error Unique code";
        }

        $id =  htmlspecialchars($decodedId, ENT_QUOTES, 'UTF-8');
        $data = Payment::select(['t_payment.*', 't_jamaah.nama as jamaah', 'm_paket.nama as paket'])
            ->leftJoin('t_jamaah', 't_jamaah.id', 't_payment.jamaah_id')
            ->leftJoin('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->where('t_payment.id', $id)
            ->first();

        $cname = Setting::where('parameter', 'company_name')->first()->value ?: '';
        $caddress = Setting::where('parameter', 'company_address')->first()->value ?: '';
        $clogo = Setting::where('parameter', 'company_logo')->first()->value ?: '';

        $pdf = PDF::loadView('print/kwitansi', array('data' =>  $data, 'cname' => $cname, 'caddress' => $caddress, 'clogo' => $clogo))
            ->setPaper('a5', 'landscape');

        return $pdf->stream();
    }

    public function manifest($id)
    {
        $decodedId = base64_decode($id);

        if ($decodedId === false) {
            echo "Error Unique code";
        }

        $id =  htmlspecialchars($decodedId, ENT_QUOTES, 'UTF-8');

        $paket = Paket::select([
            'm_paket.*',
            'm_program.nama as program',
            DB::raw("(SELECT COALESCE(COUNT(t_jamaah.id),0) AS total FROM t_jamaah WHERE t_jamaah.paket_id = m_paket.id) as total")

        ])
            ->join('m_program', 'm_program.id', 'm_paket.program_id')
            ->where('m_paket.id', $id)->first();

        $data = Jamaah::select([
            't_jamaah.*',
            'm_paket.nama as paket',
            'm_paket.publish_price as price',
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as paid FROM t_payment where t_payment.jamaah_id = t_jamaah.id and t_payment.void_by IS NULL) as paid")
        ])
            ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->where('paket_id', $id)
            ->orderBy('t_jamaah.nama', 'asc')->get();

        $cname = Setting::where('parameter', 'company_name')->first()->value ?: '';
        $caddress = Setting::where('parameter', 'company_address')->first()->value ?: '';
        $clogo = Setting::where('parameter', 'company_logo')->first()->value ?: '';

        $pdf = PDF::loadView('print/manifest', array('data' =>  $data, 'paket' => $paket, 'cname' => $cname, 'caddress' => $caddress, 'clogo' => $clogo))
            ->setPaper('a4', 'landscape');

        return $pdf->stream();
    }

    public function monthlyReport(Request $request)
    {
        $monthYear = $request->month; // '2024-08'
        list($year, $month) = explode('-', $monthYear);

        $data = Payment::select(['t_payment.*', 't_jamaah.nama as jamaah', 'm_paket.nama as paket'])
            ->leftJoin('t_jamaah', 't_jamaah.id', 't_payment.jamaah_id')
            ->leftJoin('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->whereYear('paid_at', $year)
            ->whereMonth('paid_at', $month)
            ->orderBy('id', 'desc')->get();



        $cname = Setting::where('parameter', 'company_name')->first()->value ?: '';
        $caddress = Setting::where('parameter', 'company_address')->first()->value ?: '';
        $clogo = Setting::where('parameter', 'company_logo')->first()->value ?: '';

        $pdf = PDF::loadView('print/monthlyReport', array('data' =>  $data, 'cname' => $cname, 'caddress' => $caddress, 'clogo' => $clogo, 'monthYear' => $monthYear))
            ->setPaper('a4', 'landscape');

        return $pdf->stream();
    }

    public function jamaahInfo($id)
    {
        $decodedId = base64_decode($id);

        if ($decodedId === false) {
            echo "Error Unique code";
        }

        $id =  htmlspecialchars($decodedId, ENT_QUOTES, 'UTF-8');
        $data = Jamaah::select([
            't_jamaah.*',
            'm_paket.nama as paket',
            'm_paket.publish_price as price',
            'm_paket.type',
            'm_program.nama as program',
            DB::raw("COALESCE(m_paket.publish_price,0) as price"),
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as paid FROM t_payment where t_payment.jamaah_id = t_jamaah.id and t_payment.void_by IS NULL) as paid"),
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as total FROM t_morepayment where t_morepayment.jamaah_id = t_jamaah.id) as morepayment")
        ])
            ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->join('m_program', 'm_program.id', 'm_paket.program_id')
            ->where('t_jamaah.id', $id)
            ->first();

        $history = Payment::select(['t_payment.*', 't_jamaah.nama as jamaah', 'm_paket.nama as paket'])
            ->join('t_jamaah', 't_jamaah.id', 't_payment.jamaah_id')
            ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->where('t_jamaah.id', $id)
            ->orderBy('id', 'desc')->get();

        $cname = Setting::where('parameter', 'company_name')->first()->value ?: '';
        $caddress = Setting::where('parameter', 'company_address')->first()->value ?: '';
        $clogo = Setting::where('parameter', 'company_logo')->first()->value ?: '';

        $pdf = PDF::loadView('print/jamaahInfo', array('data' =>  $data, 'history' =>  $history, 'cname' => $cname, 'caddress' => $caddress, 'clogo' => $clogo))
            ->setPaper('a5', 'landscape');

        return $pdf->stream();
    }
}
