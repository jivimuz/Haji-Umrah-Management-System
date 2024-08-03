<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function changePassword(Request $request)
    {
        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($request->np)
        ]);
        return response()->json(["message" => 'success', 'data' => true], 200);
    }
}
