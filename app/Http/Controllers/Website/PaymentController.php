<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Jamaah;
use App\Models\Paket;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        return view('pages/payment/index');
    }

    public function getList()
    {
        $data = Payment::select(['t_payment.*', 't_jamaah.nama as jamaah', 'm_paket.nama as paket'])
            ->join('t_jamaah', 't_jamaah.id', 't_payment.jamaah_id')
            ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->orderBy('id', 'desc')->get();
        return response()->json(["message" => 'success', 'data' => $data], 200);
    }

    public function add()
    {
        $jamaah = Jamaah::where('is_done', false)->get();
        return view('pages/payment/add', compact('jamaah'));
    }

    public function refund()
    {
        $jamaah = Jamaah::where('is_firstpaid', true)->get();
        return view('pages/payment/refund', compact('jamaah'));
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
        if (!$check) {
            return response()->json(["error" => 'Jamaah tidak terdaftar '], 400);
        }
        $insert = false;
        if ($request->is_refund == 1) {
            $insert = Payment::insert([
                'jamaah_id' => $request->jamaah_id,
                'jamaah_name' => $request->jamaah_name,
                'nominal' => (0 - $request->nominal),
                'remark' => $request->remark,
                'paid_at' => now(),
                'void_at' => now(),
                'void_by' => auth()->user()->id,
            ]);
        } else {
            $insert = Payment::insert([
                'jamaah_id' => $request->jamaah_id,
                'jamaah_name' => $request->jamaah_name,
                'nominal' => $request->nominal,
                'remark' => $request->remark,
                'paid_at' => now(),
                'void_at' => null,
                'void_by' => null,
            ]);
        }

        if ($insert) {
            $priceCheck = Paket::select(DB::raw('COALESCE(publish_price, 0) AS price'))->where('id', $check->paket_id)->first();
            $paidCheck = Payment::select(DB::raw('COALESCE(SUM(nominal), 0) as paid'))->where('jamaah_id', $request->jamaah_id)->first();
            $is_done = false;
            if ($paidCheck->paid >= $priceCheck->price) {
                $is_done = true;
            }
            Jamaah::where('id', $request->jamaah_id)->update([
                'is_firstpaid' => true,
                'is_done' => $is_done,
            ]);
            return response()->json(["message" => 'success', 'data' => $insert], 200);
        }
        return response()->json(["error" => 'Gagal input'], 400);
    }
}