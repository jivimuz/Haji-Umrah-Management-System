<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('pages/user_list/add', compact('top'));
    }
}
