<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Agen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgenController extends Controller
{
    public function index()
    {
        return view('pages/agen/index');
    }

    public function getList()
    {
        $data = Agen::get();
        return response()->json(["message" => 'success', 'data' => $data], 200);
    }

    public function add()
    {
        $no = Agen::select(DB::raw('coalesce(max(id), 0) as maxId'))->first()->maxId + 1;
        $top = sprintf('%05s', $no);
        return view('pages/agen/add', compact('top'));
    }

    public function saveAgen(Request $request)
    {
        $insert = Agen::insert([
            'kode_agen' => $request->kode_agen,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'no_ktp' => $request->noktp,
            'alamat' => $request->alamat,
            'nama_bank' => $request->nama_bank,
            'no_rek' => $request->no_rek,
        ]);
        if ($insert) {
            return response()->json(["message" => 'success', 'data' => $insert], 200);
        }
        return response()->json(["error" => 'Gagal input'], 400);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data = Agen::where('id', $request->id)->first();
        return view('pages/agen/edit', compact('data', 'id'));
    }

    public function updateAgen(Request $request)
    {
        $check = Agen::where('id', $request->id)->first();
        if ($check) {
            $update = Agen::where('id', $request->id)->update([
                'kode_agen' => $request->kode_agen,
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'no_ktp' => $request->noktp,
                'alamat' => $request->alamat,
                'nama_bank' => $request->nama_bank,
                'no_rek' => $request->no_rek,
            ]);
            if ($update) {
                return response()->json(["message" => 'success', 'data' => $update], 200);
            }
            return response()->json(["error" => 'Tidak ada perubahan'], 400);
        }
        return response()->json(["error" => 'Agen Tidak ada'], 400);
    }
    public function delete(Request $request)
    {
        $check = Agen::where('id', $request->id)->first();
        if ($check) {
            $delete = Agen::where('id', $request->id)->delete();

            if ($delete) {
                return response()->json(["message" => 'success', 'data' => null], 200);
            }
            return response()->json(["error" => 'Tidak ada perubahan'], 400);
        }
        return response()->json(["error" => 'Agen Tidak ada'], 400);
    }
}
