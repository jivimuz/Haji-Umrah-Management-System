<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('menu');
    }

    public function menu(Request $request)
    {
        $AccessList = explode(',', auth()->user()->access);
        $menu = $request->menu;
        $menuList = Module::when($menu, function ($query) use ($menu) {
            return $query->where('name', 'like', "%$menu%");
        })->whereIn('id', $AccessList)->whereNotIn('route', ['', '#'])->where('isactive', true)->orderBy('group_id')->orderBy('list_no')->get();
        // dd($menuList);
        return view('layout/menuList', compact('menuList'));
    }
}
