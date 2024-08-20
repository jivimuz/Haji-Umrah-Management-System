<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        $logo = Setting::where('parameter', 'company_logo')->first()->value ?: '';
        $app_name = Setting::where('parameter', 'app_name')->first()->value ?: '';

        return view('auth/login', compact('logo', 'app_name'));
    }

    public function login(Request $request)
    {
        $DataUser = User::where('username', $request->username)->orWhere('email', $request->username)->first();
        if (!$DataUser) {
            return response()->json(['error' => 'Unknown Username / Email'], 401);
        }
        if (!$DataUser->is_active) {
            return response()->json(['error' => "User isn't active, please chat admin to activate."], 401);
        }
        $credentials = [
            'email' => $DataUser->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Login Success'], 200);
        }

        return response()->json(['error' => 'Please insert the right Username/Password!!'], 401);
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

    public  function serialActivation(Request $request)
    {
        $endpoint = env('AUTH_SERVER') ?: "https://serialmanager.asvatour.site/authorization";

        $response = Http::get($endpoint, [
            'serial_code' => $request->serial,
        ]);

        $data = $response->json();
        $now = Carbon::now();
        $twoWeeksLater = $now->copy()->addWeeks(2);

        if ($data && isset($data['data']['valid_until'])) {
            $expiryDate = Carbon::parse($data['data']['valid_until']);
            DB::table('serial')->update([
                'serial_code' =>  $request->serial,
                'valid_until' => $data['data']['valid_until']
            ]);

            if ($expiryDate->lessThanOrEqualTo(Carbon::yesterday())) {
                return response()->json(['error' => 'Serial Expired from ' . date('d-m-Y', strtotime($data['data']['valid_until']))], 400);
            }

            return response()->json(['message' => 'Serial Activated', "data" => $data], 200);
        }
        return response()->json(['error' => 'Unknown Serial'], 400);
    }
}
