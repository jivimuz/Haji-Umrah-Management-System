<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        $idrToSar = Setting::where('parameter', 'price_1_sar_in_idr')->first()->value ?: 4000;
        return view('pages/info/index', compact('idrToSar'));
    }

    public function getNusukPackages(Request $request)
    {

        $client = new Client();

        try {
            $response = $client->request('GET', 'https://www.nusuk.sa/api/getPackages', [
                'query' => [
                    'locale' => 'id',
                    'pageLimit' => $request->pageLimit,
                    'pageStart' => $request->nusukNo,
                ],
                'headers' => [
                    'Referer' => 'https://www.nusuk.sa/id/partners',
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36',
                ],
            ]);

            $body = $response->getBody();
            $content = $body->getContents();

            return response()->json(json_decode($content, true));
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
