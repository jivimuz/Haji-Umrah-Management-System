<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Agen;
use App\Models\Jamaah;
use App\Models\Paket;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JamaahController extends Controller
{
    public function index()
    {
        return view('pages/jamaah/index');
    }

    public function getList()
    {
        $data = Jamaah::select([
            't_jamaah.*',
            'm_paket.nama as paket',
            'm_paket.publish_price as price',
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as paid FROM t_payment where t_payment.jamaah_id = t_jamaah.id) as paid")
        ])
            ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->orderBy('id', 'desc')->get();
        return response()->json(["message" => 'success', 'data' => $data], 200);
    }

    public function add()
    {
        $paket = Paket::select(['m_paket.*', 'm_program.nama as program'])->join('m_program', 'm_program.id', 'm_paket.program_id')->where('flight_date', '>', date('Y-m-d'))->get();
        $agen = Agen::where('is_active', true)->get();
        return view('pages/jamaah/add', compact('paket', 'agen'));
    }

    public function saveData(Request $request)
    {
        $check = Jamaah::where('no_ktp', $request->no_ktp)
            ->where('paket_id', $request->paket_id)->first();
        if ($check) {
            return response()->json(["error" => 'No KTP Jamaah sudah terdaftar di Paket ini'], 400);
        }
        $insert = Jamaah::insert([
            'nama' => $request->nama,
            'paket_id' => $request->paket_id,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'no_passport' => $request->no_passport,
            'alamat' => $request->alamat,
            'alamat' => $request->alamat,
            'agen_id' => $request->agen_id,
            'born_place' => $request->born_place,
            'born_date' => $request->born_date,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'discount' => $request->discount,
            'gender' => $request->gender,
        ]);
        if ($insert) {
            return response()->json(["message" => 'success', 'data' => $insert], 200);
        }
        return response()->json(["error" => 'Gagal input'], 400);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data = Jamaah::where('id', $request->id)->first();
        $paket = Paket::select(['m_paket.*', 'm_program.nama as program'])->join('m_program', 'm_program.id', 'm_paket.program_id')->where('m_paket.id', $data->paket_id)->first();
        $agen = Agen::where('is_active', true)->get();
        return view('pages/jamaah/edit', compact('data', 'id', 'paket', 'agen'));
    }

    public function updateData(Request $request)
    {
        $check = Jamaah::where('id', $request->id)->first();
        if ($check) {
            $update = Jamaah::where('id', $request->id)->update([
                'nama' => $request->nama,
                'paket_id' => $request->paket_id,
                'no_ktp' => $request->no_ktp,
                'no_hp' => $request->no_hp,
                'no_passport' => $request->no_passport,
                'alamat' => $request->alamat,
                'alamat' => $request->alamat,
                'agen_id' => $request->agen_id,
                'agen_id' => $request->agen_id,
                'born_place' => $request->born_place,
                'born_date' => $request->born_date,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'discount' => $request->discount,
                'gender' => $request->gender,
            ]);
            if ($update) {
                return response()->json(["message" => 'success', 'data' => $update], 200);
            }
            return response()->json(["error" => 'Tidak ada perubahan'], 400);
        }
        return response()->json(["error" => 'Jamaah Tidak ada'], 400);
    }

    public function delete(Request $request)
    {
        $check = Jamaah::where('id', $request->id)->first();
        if ($check) {
            $delete = Jamaah::where('id', $request->id)->delete();

            if ($delete) {
                return response()->json(["message" => 'success', 'data' => null], 200);
            }
            return response()->json(["error" => 'Tidak ada perubahan'], 400);
        }
        return response()->json(["error" => 'Jamaah Tidak ada'], 400);
    }

    public function payment(Request $request)
    {
        $id = $request->id;
        return view('pages/jamaah/payment', compact('id'));
    }

    public function getListPayment(Request $request)
    {
        $history = Payment::select(['t_payment.*', 't_jamaah.nama as jamaah', 'm_paket.nama as paket'])
            ->join('t_jamaah', 't_jamaah.id', 't_payment.jamaah_id')
            ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->where('t_jamaah.id', $request->id)
            ->orderBy('id', 'desc')->get();
        $paidCheck = Payment::select(DB::raw('COALESCE(SUM(nominal), 0) as paid'))->where('jamaah_id', $request->id)->first()->paid;
        return response()->json(["message" => 'success', 'data' => $history, 'paid' => $paidCheck], 200);
    }
}
