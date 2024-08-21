<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Agen;
use App\Models\Jamaah;
use App\Models\MorePayment;
use App\Models\Paket;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JamaahController extends Controller
{
    public function index()
    {
        return view('pages/jamaah/index');
    }

    public function getList(Request $request)
    {
        $type = $request->type;
        $data = Jamaah::select([
            't_jamaah.*',
            'm_paket.nama as paket',
            'm_paket.type',
            DB::raw("COALESCE(m_paket.publish_price,0) as price"),
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as paid FROM t_payment where t_payment.jamaah_id = t_jamaah.id and t_payment.void_by IS NULL) as paid"),
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as total FROM t_morepayment where t_morepayment.jamaah_id = t_jamaah.id) as morepayment")
        ])
            ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->when($type, function ($q) use ($type) {
                return $q->where('m_paket.type', $type);
            })
            ->orderBy('id', 'desc')->get();
        return response()->json(["message" => 'success', 'data' => $data], 200);
    }

    public function addUmrah()
    {
        $paket = Paket::select(['m_paket.*', 'm_program.nama as program'])->join('m_program', 'm_program.id', 'm_paket.program_id')->where('m_paket.type', 'Umrah')->where('flight_date', '>=', date('Y-m-d'))->get();
        $agen = Agen::where('is_active', true)->get();
        $isHaji = false;
        return view('pages/jamaah/add', compact('paket', 'agen', 'isHaji'));
    }

    public function addHaji()
    {
        $paket = Paket::select(['m_paket.*', 'm_program.nama as program'])->join('m_program', 'm_program.id', 'm_paket.program_id')->where('m_paket.type', 'Haji')->where('flight_date', '>=', date('Y-m-d'))->get();
        $agen = Agen::where('is_active', true)->get();
        $isHaji = true;
        return view('pages/jamaah/add', compact('paket', 'agen', 'isHaji'));
    }

    public function saveData(Request $request)
    {
        DB::beginTransaction();
        try {
            $check = Jamaah::where('no_ktp', $request->no_ktp)
                ->where('paket_id', $request->paket_id)
                ->first();

            if ($check) {
                DB::rollback();
                return response()->json(["error" => 'No KTP Jamaah sudah terdaftar di Paket ini'], 400);
            }

            $file_path = null;
            if ($request->hasFile('attachment')) {
                $upload_dir = 'images/jamaah';
                $file = $request->file('attachment')[0];
                $file_name = uniqid() . '-' . $file->getClientOriginalName();
                $file_path = $upload_dir . '/' . $file_name;
            }

            $insert = Jamaah::create([
                'nama' => $request->nama_jamaah,
                'paket_id' => $request->paket,
                'no_ktp' => $request->noktp,
                'no_hp' => $request->no_hp,
                'no_passport' => $request->no_passport,
                'passport_date' => $request->passport_date,
                'passport_expired' => $request->passport_expired,
                'city_passport' => $request->city_passport,
                'alamat' => $request->alamat,
                'agen_id' => $request->agen_id,
                'born_place' => $request->born_place,
                'born_date' => $request->born_date,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'discount' => $request->discount,
                'gender' => $request->gender,
                'no_porsi' => $request->no_porsi ?: null,
                'regis_date' => $request->regis_date ?: null,
                'est_date' => $request->est_date ?: null,
                'vaccine1' => $request->vaccine1,
                'vaccine1_date' => $request->vaccine1_date,
                'vaccine2' => $request->vaccine2,
                'vaccine2_date' => $request->vaccine2_date,
                'vaccine3' => $request->vaccine3,
                'vaccine3_date' => $request->vaccine3_date,
                'attachment' => $file_path,
                'created_at' => Carbon::now()
            ]);

            if ($file_path) {
                $file->move(public_path($upload_dir), $file_name);
            }

            DB::commit();
            return response()->json(["message" => 'success', 'data' => $insert], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(["message" => 'error', 'data' => null, 'error' => $th->getMessage()], 400);
        }
    }


    public function edit(Request $request)
    {
        $id = $request->id;
        $data = Jamaah::where('id', $request->id)->first();
        $paket = Paket::select(['m_paket.*', 'm_program.nama as program'])->join('m_program', 'm_program.id', 'm_paket.program_id')->where('m_paket.id', $data->paket_id)->first();
        $agen = Agen::where('is_active', true)->get();
        $isHaji = $request->isHaji ?: false;
        return view('pages/jamaah/edit', compact('data', 'id', 'paket', 'agen', 'isHaji'));
    }


    public function updateData(Request $request)
    {
        try {
            DB::beginTransaction();
            $check = Jamaah::where('id', $request->id)->first();
            if ($check) {
                $file_path = $check->attachment;
                if ($request->file()) {
                    if (file_exists($check->attachment)) {
                        unlink($check->attachment);
                    }
                    $upload_dir = 'images/jamaah';
                    $file = $request->file('attachment')[0];
                    $file_name = uniqid() . '-' . $file->getClientOriginalName();
                    $file_path = $upload_dir . '/' . $file_name;
                }

                $update = Jamaah::where('id', $request->id)->update([
                    'nama' => $request->nama_jamaah,
                    'paket_id' => $request->paket,
                    'no_ktp' => $request->noktp,
                    'no_hp' => $request->no_hp,
                    'no_passport' => $request->no_passport,
                    'passport_date' => $request->passport_date,
                    'passport_expired' => $request->passport_expired,
                    'city_passport' => $request->city_passport,
                    'alamat' => $request->alamat,
                    'agen_id' => $request->agen_id,
                    'born_place' => $request->born_place,
                    'born_date' => $request->born_date,
                    'nama_ayah' => $request->nama_ayah,
                    'nama_ibu' => $request->nama_ibu,
                    'discount' => $request->discount,
                    'gender' => $request->gender,
                    'no_porsi' => $request->no_porsi ?: null,
                    'regis_date' => $request->regis_date ?: null,
                    'est_date' => $request->est_date ?: null,
                    'vaccine1' => $request->vaccine1,
                    'vaccine1_date' => $request->vaccine1_date,
                    'vaccine2' => $request->vaccine2,
                    'vaccine2_date' => $request->vaccine2_date,
                    'vaccine3' => $request->vaccine3,
                    'vaccine3_date' => $request->vaccine3_date,
                    'attachment' => $file_path,
                    'updated_at' => Carbon::now()
                ]);

                if ($request->file() && $update) {
                    $file->move(public_path($upload_dir), $file_name);
                }
                if ($update) {
                    DB::commit();
                    return response()->json(["message" => 'success', 'data' => $update], 200);
                }
            }
            return response()->json(["error" => 'Gagal input'], 400);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(["message" => 'error', 'data' => null, 'error' => $th->getMessage()], 400);
        }
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
        $data = Jamaah::select([
            't_jamaah.*',
            'm_paket.nama as paket',
            'm_paket.publish_price as price',
            'm_paket.type',
            'm_program.nama as program',
            DB::raw("COALESCE(m_paket.publish_price,0) as price"),
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as paid FROM t_payment where t_payment.jamaah_id = t_jamaah.id and t_payment.void_by IS NULL) as paid"),
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as total FROM t_morepayment where t_morepayment.jamaah_id = t_jamaah.id ) as morepayment")
        ])
            ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->join('m_program', 'm_program.id', 'm_paket.program_id')
            ->where('t_jamaah.id', $id)
            ->first();

        return view('pages/jamaah/payment', compact('id', 'data'));
    }

    public function getListPayment(Request $request)
    {
        $history = Payment::select(['t_payment.*', 't_jamaah.nama as jamaah', 'm_paket.nama as paket'])
            ->join('t_jamaah', 't_jamaah.id', 't_payment.jamaah_id')
            ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->where('t_jamaah.id', $request->id)
            ->whereNull('t_payment.void_by')
            ->orderBy('t_payment.id', 'desc')->get();
        $paidCheck = Payment::select(DB::raw('COALESCE(SUM(nominal), 0) as paid'))->where('jamaah_id', $request->id)->whereNull('void_by')->first()->paid;
        return response()->json(["message" => 'success', 'data' => $history, 'paid' => $paidCheck], 200);
    }

    public function morePayment(Request $request)
    {
        $id = $request->id;
        $data = MorePayment::where('jamaah_id', $id)->get();
        $jamaah = Jamaah::select([
            't_jamaah.nama',
            't_jamaah.is_done',
            'm_paket.nama as paket',
            'm_paket.publish_price as price',
            'm_paket.type',
            DB::raw("COALESCE(m_paket.publish_price,0) as price"),
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as paid FROM t_payment where t_payment.jamaah_id = t_jamaah.id and t_payment.void_by IS NULL) as paid"),
            DB::raw("(SELECT COALESCE(SUM(nominal), 0) as total FROM t_morepayment where t_morepayment.jamaah_id = t_jamaah.id) as morepayment")
        ])
            ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->where('t_jamaah.id', $id)
            ->first();

        return view('pages/jamaah/morePayment', compact('id', 'data', 'jamaah'));
    }

    function saveAddBiaya(Request $request)
    {
        try {
            DB::beginTransaction();
            $check = Jamaah::where('id', $request->id)->first();
            if ($check) {
                $insert = MorePayment::insert([
                    'jamaah_id' => $request->id,
                    'jamaah_name' => $request->nama,
                    'nominal' =>  $request->nominal ?: 0,
                    'remark' => $request->remark,
                ]);
                if ($insert) {
                    DB::commit();
                    return response()->json(["message" => 'success', 'data' => $insert], 200);
                }
            }
            return response()->json(["error" => 'Gagal input'], 400);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(["message" => 'error', 'data' => null, 'error' => $th->getMessage()], 400);
        }
    }

    public function deleteMorePayment(Request $request)
    {
        $check = MorePayment::where('id', $request->id)->first();
        if ($check) {
            $delete = MorePayment::where('id', $request->id)->delete();

            if ($delete) {
                return response()->json(["message" => 'success', 'data' => null], 200);
            }
            return response()->json(["error" => 'Tidak ada perubahan'], 400);
        }
        return response()->json(["error" => 'Data Tidak ada'], 400);
    }

    public function jamaahListByParams(Request $request)
    {
        $data = Jamaah::where('nama', 'like', '%' . $request->params . '%')
            ->orWhere('nama', 'like', '%' . $request->params . '%')
            ->limit(20)
            ->get();
        $selectTitle = $request->selectTitle ?: null;
        $selectVal = $request->selectVal ?: null;

        return response()->json(["message" => 'success', 'data' => $data, 'selectTitle' => $selectTitle, 'selectVal' => $selectVal], 200);
    }
}
