<?php

namespace App\Http\Middleware;

use App\Models\Serial;
use Carbon\Carbon;
use Closure;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class SerialAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $isLocal = false;
        $serial = Serial::first() ?: null;
        if (!$serial) {
            return redirect()->route('error')->with('isExpired', true);
        }

        $endpoint = env('AUTH_SERVER') ?: "https://serialmanager.asvatour.site/authorization";

        $response = Http::get($endpoint, [
            'serial_code' => $serial->serial_code,
        ]);

        if (!$isLocal) {
            $data = $response->json();
            $now = Carbon::now();
            $twoWeeksLater = $now->addWeeks(2);
            if ($data && $data['data']['valid_until']) {
                $expiryDate = Carbon::parse($data['data']['valid_until']);
                $update = DB::select("UPDATE serial set valid_until = ?", [$data['data']['valid_until']]);

                if ($expiryDate->lessThanOrEqualTo(Carbon::yesterday())) {
                    return redirect()->route('error')->with('isExpired', true);
                }


                if ($expiryDate->lessThanOrEqualTo($twoWeeksLater)) {
                    session()->flash('expiredAlert', true);
                    session()->flash('expiredDate', "App will blocket at " . $data['data']['valid_until']);
                }
            }
        }

        $expiryDate = Carbon::parse($serial->valid_until);
        if ($expiryDate->lessThanOrEqualTo(Carbon::yesterday())) {
            return redirect()->route('error')->with('isExpired', true);
        }

        if (Carbon::parse($serial->valid_until)->lessThanOrEqualTo($twoWeeksLater)) {
            session()->flash('expiredAlert', true);
            session()->flash('expiredDate', "App will blocket at " . $serial->valid_until);
        }

        return $next($request);
    }
}
