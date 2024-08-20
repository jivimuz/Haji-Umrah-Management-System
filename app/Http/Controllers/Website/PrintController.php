<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Jamaah;
use App\Models\Paket;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintController extends Controller
{
    public function index()
    {
        $users = Employee::all();
        return view('print/index', compact('users'));
    }

    public function kwitansi($id)
    {
        $decodedId = base64_decode($id);

        if ($decodedId === false) {
            echo "Error Unique code";
        }

        $id =  htmlspecialchars($decodedId, ENT_QUOTES, 'UTF-8');
        $data = Payment::select(['t_payment.*', 't_jamaah.nama as jamaah', 'm_agen.nama as agen',  'm_paket.nama as paket'])
            ->leftJoin('m_agen', 'm_agen.id', 't_payment.agen_id')
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

        $data = Payment::select(['t_payment.*', 't_jamaah.nama as jamaah', 'm_agen.nama as agen', 'm_paket.nama as paket'])
            ->leftJoin('t_jamaah', 't_jamaah.id', 't_payment.jamaah_id')
            ->leftJoin('m_agen', 'm_agen.id', 't_payment.agen_id')
            ->leftJoin('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->whereYear('paid_at', $year)
            ->whereMonth('paid_at', $month)
            ->whereNull('t_payment.void_by')
            ->orderBy('t_payment.id', 'desc')->get();

        $cname = Setting::where('parameter', 'company_name')->first()->value ?: '';
        $caddress = Setting::where('parameter', 'company_address')->first()->value ?: '';
        $clogo = Setting::where('parameter', 'company_logo')->first()->value ?: '';

        $pdf = PDF::loadView('print/monthlyReport', array('data' =>  $data, 'cname' => $cname, 'caddress' => $caddress, 'clogo' => $clogo, 'monthYear' => $monthYear))
            ->setPaper('a4', 'landscape');

        return $pdf->stream();
    }

    public function jamaahInfo(Request $request, $id)
    {
        $decodedId = base64_decode($id);
        $decodedBy = $request->by ? base64_decode($request->by) : auth()->user()->id;
        $iduser =  htmlspecialchars($decodedBy, ENT_QUOTES, 'UTF-8');

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
            ->whereNull('t_payment.void_by')
            ->where('t_jamaah.id', $id)
            ->orderBy('t_payment.id', 'desc')->get();

        $cname = Setting::where('parameter', 'company_name')->first()->value ?: '';
        $caddress = Setting::where('parameter', 'company_address')->first()->value ?: '';
        $clogo = Setting::where('parameter', 'company_logo')->first()->value ?: '';
        $employee = Employee::select('m_employee.*', 'm_designation.name as jabatan')->join('m_designation', 'm_employee.fk_designation', 'm_designation.id')->where('m_employee.id', $iduser)->first();
        $ccity = Setting::where('parameter', 'company_city')->first()->value ?: '';

        $pdf = PDF::loadView('print/jamaahInfo', array('data' =>  $data, 'history' =>  $history, 'cname' => $cname, 'caddress' => $caddress, 'clogo' => $clogo, 'ccity' => $ccity, 'employee' => $employee))
            ->setPaper('a5', 'landscape');

        return $pdf->stream();
    }

    public function suratRekomendasi(Request $request, $id)
    {
        $decodedId = base64_decode($id);
        $decodedBy = base64_decode($request->by);

        if ($decodedId === false) {
            echo "Error Unique code";
        }

        $id =  htmlspecialchars($decodedId, ENT_QUOTES, 'UTF-8');
        $data = Jamaah::select([
            't_jamaah.*',
            'm_paket.nama as paket',
            'm_paket.publish_price as price',
            'm_paket.type',
            'm_paket.flight_date',
            'm_program.nama as program',
            DB::raw("COALESCE(m_paket.publish_price,0) as price"),
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as paid FROM t_payment where t_payment.jamaah_id = t_jamaah.id and t_payment.void_by IS NULL) as paid"),
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as total FROM t_morepayment where t_morepayment.jamaah_id = t_jamaah.id) as morepayment")
        ])
            ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->join('m_program', 'm_program.id', 'm_paket.program_id')
            ->where('t_jamaah.id', $id)
            ->first();

        $iduser =  htmlspecialchars($decodedBy, ENT_QUOTES, 'UTF-8');
        $employee = Employee::select('m_employee.*', 'm_designation.name as jabatan')->join('m_designation', 'm_employee.fk_designation', 'm_designation.id')->where('m_employee.id', $iduser)->first();

        $cname = Setting::where('parameter', 'company_name')->first()->value ?: '';
        $caddress = Setting::where('parameter', 'company_address')->first()->value ?: '';
        $clogo = Setting::where('parameter', 'company_logo')->first()->value ?: '';
        $ccity = Setting::where('parameter', 'company_city')->first()->value ?: '';
        $no_surat = Setting::where('parameter', 'no_surat')->first()->value + 1 ?: 1;
        Setting::where('parameter', 'no_surat')->update([
            'value' => $no_surat
        ]);

        $pdf = PDF::loadView('print/suratRekomendasi', array('data' =>  $data, 'employee' =>  $employee, 'cname' => $cname, 'caddress' => $caddress, 'clogo' => $clogo, 'ccity' => $ccity, 'no_surat' => $no_surat))
            ->setPaper('a5', 'potrait');

        return $pdf->stream();
    }

    public function suratIjin(Request $request, $id)
    {
        $decodedId = base64_decode($id);
        $decodedBy = base64_decode($request->by);
        $to = base64_decode($request->to);

        if ($decodedId === false) {
            echo "Error Unique code";
        }

        $id =  htmlspecialchars($decodedId, ENT_QUOTES, 'UTF-8');
        $data = Jamaah::select([
            't_jamaah.*',
            'm_paket.nama as paket',
            'm_paket.publish_price as price',
            'm_paket.type',
            'm_paket.flight_date',
            'm_paket.return_date',
            'm_program.nama as program',
            DB::raw("COALESCE(m_paket.publish_price,0) as price"),
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as paid FROM t_payment where t_payment.jamaah_id = t_jamaah.id and t_payment.void_by IS NULL) as paid"),
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as total FROM t_morepayment where t_morepayment.jamaah_id = t_jamaah.id) as morepayment")
        ])
            ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->join('m_program', 'm_program.id', 'm_paket.program_id')
            ->where('t_jamaah.id', $id)
            ->first();

        $iduser =  htmlspecialchars($decodedBy, ENT_QUOTES, 'UTF-8');
        $employee = Employee::select('m_employee.*', 'm_designation.name as jabatan')->join('m_designation', 'm_employee.fk_designation', 'm_designation.id')->where('m_employee.id', $iduser)->first();

        $cname = Setting::where('parameter', 'company_name')->first()->value ?: '';
        $caddress = Setting::where('parameter', 'company_address')->first()->value ?: '';
        $clogo = Setting::where('parameter', 'company_logo')->first()->value ?: '';
        $ccity = Setting::where('parameter', 'company_city')->first()->value ?: '';
        $no_surat = Setting::where('parameter', 'no_surat')->first()->value + 1 ?: 1;
        Setting::where('parameter', 'no_surat')->update([
            'value' => $no_surat
        ]);

        $pdf = PDF::loadView('print/suratIjin', array('data' =>  $data, 'employee' =>  $employee, 'cname' => $cname, 'caddress' => $caddress, 'clogo' => $clogo, 'ccity' => $ccity, 'no_surat' => $no_surat, 'to' =>  $to))
            ->setPaper('a5', 'potrait');

        return $pdf->stream();
    }
}
