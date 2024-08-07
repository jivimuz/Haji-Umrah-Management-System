<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        return view('pages/setting/index');
    }

    public function getParameter()
    {
        $setting = Setting::get();
        return response()->json(["message" => 'success', 'data' => $setting], 200);
    }


    public function saveSettingD(Request $request)
    {
        $setting = Setting::where('id', $request->param)->update(['value' => $request->val]);
        if (!$setting) {
            return response()->json(["error" => 'Update Fail', 'data' => $setting], 400);
        }
        return response()->json(["message" => 'success', 'data' => $setting], 200);
    }

    public function saveSettingF(Request $request)
    {
        try {
            $request->validate([
                'val.*' => 'required|mimes:gif,jpeg,png|max:2048', // Maksimal ukuran file 2MB
            ]);

            $cek = Setting::where('id', $request->param[0])->first();


            // Delete old file if it exists
            if ($cek && $cek->value) {
                $filePath = public_path($cek->value);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $upload_dir = 'images/config';
            // Store the new file
            $file = $request->file('val')[0];
            $file_name = uniqid() . '-' . $file->getClientOriginalName();
            $file_path = $upload_dir . '/' . $file_name;

            // Move the file to the public directory
            $file->move(public_path($upload_dir), $file_name);

            // Update the setting with the new file path
            $setting = Setting::where('id', $request->param[0])->update(['value' => $file_path]);

            return response()->json(["message" => 'success', 'data' => $setting], 200);
        } catch (\Throwable $e) {
            return response()->json(["error" => $e->getMessage()], 400);
        }
    }
}
