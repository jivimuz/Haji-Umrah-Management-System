<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\JobLevel;
use App\Models\JobType;
use App\Models\MarialStatus;
use App\Models\Ptkp;
use App\Models\Religion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserListController extends Controller
{
    public function index()
    {
        return view('pages/user_list/index');
    }

    public function getList()
    {
        $data = User::select([
            'm_users.id',
            'm_employee.fullname',
            DB::raw("coalesce(m_designation.name, '-') as designation"),
            DB::raw("coalesce(m_department.name, '-') as department"),
            'm_users.is_active',
        ])
            ->join('m_employee', "m_users.id", "m_employee.fk_user")
            ->leftJoin('m_designation', "m_designation.id", "m_employee.fk_designation")
            ->leftJoin('m_department', "m_department.id", "m_designation.fk_department")
            ->whereNot('m_users.id', 1)->get();
        return response()->json(["message" => 'success', 'data' => $data], 200);
    }

    public function add()
    {
        $no = User::select(DB::raw('coalesce(max(id), 0) as maxId'))->first()->maxId + 1;
        $top = date('y') . sprintf('%05s', $no);

        $jl = JobLevel::get();
        $jt = JobType::get();
        $ds = Designation::get();
        $ms = MarialStatus::get();
        $ptkp = Ptkp::get();
        $rl = Religion::get();
        $bk = Bank::get();
        return view('pages/user_list/add', compact('top', 'jl', 'jt', 'ds', 'ms', 'ptkp', 'rl', 'bk'));
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $user = User::where('id', $id)->first();
        $data = Employee::where('fk_user', $id)->first();
        $jl = JobLevel::get();
        $jt = JobType::get();
        $ds = Designation::get();
        $ms = MarialStatus::get();
        $ptkp = Ptkp::get();
        $rl = Religion::get();
        $bk = Bank::get();
        return view('pages/user_list/edit', compact('user', 'data', 'jl', 'jt', 'ds', 'ms', 'ptkp', 'rl', 'bk', 'id'));
    }

    public function cekEmail(Request $request)
    {
        $cek = User::where('email', $request->email)->first();
        $isValid = $cek ? false : true;
        return response()->json(["message" => 'success', 'data' => null, 'isValid' => $isValid], 200);
    }
    public function cekUsername(Request $request)
    {
        $cek = User::where('username', $request->username)->first();
        $isValid = $cek ? false : true;
        return response()->json(["message" => 'success', 'data' => null, 'isValid' => $isValid], 200);
    }

    public function saveData(Request $request)
    {
        try {
            DB::beginTransaction();

            $id =  User::insertGetID([
                'username' => $request->email,
                'email' => $request->email,
                'email_verified_at' => now(),
                'password' =>  Hash::make($request->pwd),
                'remember_token' => Str::random(10),
                'is_active' => true,
                'access' => 1
            ],);

            Employee::insert([
                'fk_user' => $id,
                'nik' => $request->nik,
                'fullname' => $request->fullname,
                "fk_joblevel" => $request->fk_joblevel,
                "fk_jobtype" =>  $request->fk_jobtype,
                "fk_designation" => $request->fk_designation,
                "gajipokok" => $request->gajipokok,
                "fk_ptkp" =>  $request->fk_ptkp,
                "npwp" => $request->npwp,
                "joindate" => $request->joindate,
                "outdate" => $request->outdate ?: null,
                "bornloc" => $request->bornloc,
                "borndate" => $request->born_date,
                "gender" => $request->gender ?: '-',
                "personalemail" =>  $request->personal_email,
                "phonenumber" => $request->phone_number,
                "fk_marialstatus" => $request->fk_marialstatus,
                "fk_religion" => $request->fk_religion,
                "alamat" => $request->alamat,
                "fk_bank" => $request->fk_bank,
                "accountnumber" =>  $request->accountnumber,
            ]);
            DB::commit();
            return response()->json(["message" => 'success', 'data' => null], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(["message" => 'error', 'data' => null, 'error' => $th->getMessage()], 400);
        }
    }

    public function updateData(Request $request)
    {
        try {
            DB::beginTransaction();

            if ($request->pwd) {
                User::where('id', $request->id)->update([
                    'password' =>  Hash::make($request->pwd),
                ],);
            }

            Employee::where('fk_user', $request->id)->update([
                'nik' => $request->nik,
                'fullname' => $request->fullname,
                "fk_joblevel" => $request->fk_joblevel,
                "fk_jobtype" =>  $request->fk_jobtype,
                "fk_designation" => $request->fk_designation,
                "gajipokok" => $request->gajipokok,
                "fk_ptkp" =>  $request->fk_ptkp,
                "npwp" => $request->npwp,
                "joindate" => $request->joindate,
                "outdate" => $request->outdate ?: null,
                "bornloc" => $request->bornloc,
                "borndate" => $request->born_date,
                "gender" => $request->gender ?: '-',
                "personalemail" =>  $request->personal_email,
                "phonenumber" => $request->phone_number,
                "fk_marialstatus" => $request->fk_marialstatus,
                "alamat" => $request->alamat,
                "fk_religion" => $request->fk_religion,
                "fk_bank" => $request->fk_bank,
                "accountnumber" =>  $request->accountnumber,
            ]);
            DB::commit();
            return response()->json(["message" => 'success', 'data' => null], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(["message" => 'error', 'data' => null, 'error' => $th->getMessage()], 400);
        }
    }

    public function activateUser(Request $request)
    {
        User::where('id', $request->id)->update([
            'is_active' => true,
        ]);
        return response()->json(["message" => 'success', 'data' => null], 200);
    }

    public function deactivateUser(Request $request)
    {
        User::where('id', $request->id)->update([
            'is_active' => false,
        ]);
        return response()->json(["message" => 'success', 'data' => null], 200);
    }

    public function deleteUser(Request $request)
    {
        $check = User::where('id', $request->id)->first();
        if ($check) {
            User::where('id', $request->id)->delete();
            return response()->json(["message" => 'success', 'data' => null], 200);
        }
        return response()->json(["error" => 'Delete Failure', 'data' => null], 400);
    }

    public function jabatan()
    {
        $department = Department::get();
        return view('pages/user_list/jabatan', compact('department'));
    }

    public function getJabatanList()
    {
        $data = Designation::select([
            'm_designation.*',
            'm_department.name as department',
            DB::raw("(SELECT COALESCE(COUNT(id), 0) FROM m_employee WHERE fk_designation = m_designation.id LIMIT 1) as used")
        ])->join('m_department', 'm_designation.fk_department', 'm_department.id')->get();
        return response()->json(["message" => 'success', 'data' => $data], 200);
    }

    public function saveJabatan(Request $request)
    {
        $name = $request->name;
        $department = $request->department;
        $departmentId = $department;
        if (!is_numeric($department)) {
            $code = substr($department, 0, 3);
            $cekDep = Department::select(DB::raw('COALESCE(COUNT(id), 0) as count'))->where('code', $code)->first();
            $insertId = Department::insertGetID([
                'name' => $department,
                'code' => $cekDep && $cekDep->count > 0 ? $code . $cekDep->count + 1 : $code
            ]);
            $departmentId = $insertId;
        }

        $insert = Designation::insertGetID([
            'name' => $name,
            'fk_department' => $departmentId ?: 0
        ]);

        if ($insert) {
            return response()->json(["message" => 'success', 'data' => null], 200);
        }
        return response()->json(["error" => 'Insert Failure', 'data' => null], 400);
    }

    public function deleteJabatan(Request $request)
    {

        $check = Designation::where('id', $request->id)->first();
        if ($check) {
            Designation::where('id', $request->id)->delete();
            return response()->json(["message" => 'success', 'data' => null], 200);
        }
        return response()->json(["error" => 'Delete Failure', 'data' => null], 400);
    }
}
