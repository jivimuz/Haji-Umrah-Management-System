<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;

class ModuleController extends Controller
{
    public function index()
    {
        $userList = User::with('employee')->whereNot('id', auth()->user()->id)->whereNot('id', 1)->get();

        return  view('pages/access/index', compact('userList'));
    }

    function getMenuList(Request $request)
    {
        $roleList = Role::get();
        $c = User::select('access')->where('id',  $request->userId)->first();
        $MList = $c ? $c->access : '';
        $role = 'Custom';
        if ($request->role) {
            $b = Role::where('id',  $request->role)->first();
            if ($b) {
                $MList = $b ? $b->menuAccess : '';
                $role = $b ? $b->name : 'Custom';
            }
        } else {
            $a = Role::whereRaw("menuAccess = '$MList'")->first();
            $role = $a ? $a->name : 'Custom';
        }


        $menuList = Module::whereNotIn('route', ['', '#'])->orderBy('group_id')->orderBy('list_no')->get();
        $accessList = Module::whereNotIn('route', ['', '#'])->whereIn('id', explode(',', $MList))->orderBy('id', 'asc')->get();


        return view('pages/access/list', compact('accessList', 'menuList', "role", 'roleList'));
        // return response()->json(["AccessList" => $AccessList, "menuList" =>$menuList], 200);
    }

    function saveAccess(Request $request)
    {
        $access = [];
        $header = [];
        if ($request->sArray) {
            foreach ($request->sArray as $i) {
                if (!in_array($i['ids'], $access)) {
                    $access[] = $i['ids'];
                }
                if (!in_array($i['idg'], $header)) {
                    $header[] = $i['idg'];
                }
            }
        }
        sort($access);

        $update = User::where('id', strip_tags($request->userId))->update([
            "access" => implode(',', $access)
        ]);
        if ($update) {
            return response()->json(["message" => 'success'], 200);
        }
        return response()->json(["error" => 'error'], 400);
    }
}
