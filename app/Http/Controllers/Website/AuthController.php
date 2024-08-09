<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        $logo = Setting::where('parameter', 'company_logo')->first()->value ?: 'Logo';
        $app_name = Setting::where('parameter', 'app_name')->first()->value ?: 'AppName';

        return view('auth/login', compact('logo', 'app_name'));
    }

    public function login(Request $request)
    {
        $DataUser = User::where('username', $request->username)->orWhere('email', $request->username)->first();
        if (!$DataUser) {
            return response()->json(['error' => 'Unknown Username / Email'], 401);
        }
        $credentials = [
            'email' => $DataUser->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Login Success'], 200);
        }

        return response()->json(['error' => 'Login Failed'], 401);
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function error()
    {
        return view('layout/error');
    }
}
