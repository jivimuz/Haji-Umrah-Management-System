  <!-- public function handle($request, Closure $next)
    {
        if ($request->is('api/*')) {
            if (!$request->is('api/auth/register') && !$request->is('api/auth/login')) {
                if (!Auth::guard('api')->check()) {
                    return response()->json(['status' => false, 'message' => 'Unauthorized'], 401);
                }

                // check for in active token
                if (!JwtToken::fnIsTokenActive($request->bearerToken())) {
                    return response()->json(['status' => false, 'message' => 'Unauthorized'], 401);
                }
            }
        }

        $type = env('TYPE_LOCAL_SERVER') ?: 0;
        if (!$type == 2) {
            $serial = Serial::first() ?: null;
            if (!$serial) {
                return redirect()->route('error')->with('isExpired', true);
            }

            $endpoint = env('AUTH_SERVER') ?: "https://serialmanager.asvatour.site/authorization";

            $response = Http::get($endpoint, [
                'serial_code' => $serial->serial_code,
            ]);

            if ($type == 0) {
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
        }

        return $next($request);
    }
 -->
