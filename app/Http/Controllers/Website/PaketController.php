<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Jamaah;
use App\Models\Paket;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaketController extends Controller
{
    public function index()
    {
        return view('pages/paket/index');
    }

    public function getList()
    {
        $data = Paket::select([
            'm_paket.*',
            'm_program.nama as program',
            DB::raw("(SELECT COALESCE(COUNT(t_jamaah.id),0) AS total FROM t_jamaah WHERE t_jamaah.paket_id = m_paket.id) as total")
        ])
            ->join('m_program', 'm_program.id', 'm_paket.program_id')->orderBy('id', 'desc')->get();
        return response()->json(["message" => 'success', 'data' => $data], 200);
    }

    public function add()
    {
        $program = Program::get();
        return view('pages/paket/add', compact('program'));
    }

    public function saveData(Request $request)
    {
        if (is_numeric($request->program)) {
            $program_id = $request->program;
        } else {
            $program_id = Program::insertGetId(['nama' => $request->program]);
        }
        $insert = Paket::insert([
            'nama' => $request->nama,
            'program_id' => $program_id,
            'publish_price' => $request->publish_price,
            'basic_price' => $request->basic_price,
            'flight_date' => $request->flight_date,
        ]);
        if ($insert) {
            return response()->json(["message" => 'success', 'data' => $insert], 200);
        }
        return response()->json(["error" => 'Gagal input'], 400);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data = Paket::where('id', $request->id)->first();
        $program = Program::get();
        $total = Jamaah::select(DB::raw('COALESCE(COUNT(id), 0) AS total'))
            ->where('paket_id', $request->id)
            ->first();

        return view('pages/paket/edit', compact('data', 'id', 'program', 'total'));
    }

    public function updateData(Request $request)
    {
        $check = Paket::where('id', $request->id)->first();
        if ($check) {
            if (is_numeric($request->program)) {
                $program_id = $request->program;
            } else {
                $program_id = Program::insertGetId(['nama' => $request->program]);
            }
            $update = Paket::where('id', $request->id)->update([
                'nama' => $request->nama,
                'program_id' => $program_id,
                'publish_price' => $request->publish_price,
                'basic_price' => $request->basic_price,
                'flight_date' => $request->flight_date,
            ]);
            if ($update) {
                return response()->json(["message" => 'success', 'data' => $update], 200);
            }
            return response()->json(["error" => 'Tidak ada perubahan'], 400);
        }
        return response()->json(["error" => 'Paket Tidak ada'], 400);
    }
    public function delete(Request $request)
    {
        $check = Paket::where('id', $request->id)->first();
        if ($check) {
            $delete = Paket::where('id', $request->id)->delete();

            if ($delete) {
                return response()->json(["message" => 'success', 'data' => null], 200);
            }
            return response()->json(["error" => 'Tidak ada perubahan'], 400);
        }
        return response()->json(["error" => 'Paket Tidak ada'], 400);
    }
}
