 <!-- public function handle($request, Closure $next)
    {
        if ($request->is('api/*')) {
            if (!$request->is('api/auth/register') && !$request->is('api/auth/login')) {
                if (!Auth::guard('api')->check()) {
                    return response()->json(['status' => false, 'message' => 'Unauthorized'], 401);
                }

                // Check for inactive token
                if (!JwtToken::fnIsTokenActive($request->bearerToken())) {
                    return response()->json(['status' => false, 'message' => 'Unauthorized'], 401);
                }
            }
        }

        // Handle local server type logic
        if (!$request->is('serialActivation')) {
            $type = env('TYPE_LOCAL_SERVER', 0); // Ensure default is 0 if not set
            if (!$type == 2) {
                $serial = Serial::first();

                if ($type == 0) {
                    $endpoint = env('AUTH_SERVER', 'https://serialmanager.asvatour.site/authorization');

                    $response = Http::get($endpoint, [
                        'serial_code' => $serial ? $serial->serial_code : '-',
                    ]);
                    $data = $response->json();

                    $now = Carbon::now();
                    $twoWeeksLater = $now->copy()->addWeeks(2); // Use copy to avoid modifying $now

                    if ($data && isset($data['data']['valid_until'])) {
                        $expiryDate = Carbon::parse($data['data']['valid_until']);
                        DB::table('serial')->update(['valid_until' => $data['data']['valid_until']]); // Use DB facade for clarity

                        // Check if the serial is expired
                        if ($expiryDate->lessThanOrEqualTo(Carbon::yesterday()) && !$request->is('error')) {
                            return redirect()->route('error')->with('isExpired', true);
                        }

                        // Set alert if expiring soon
                        if ($expiryDate->lessThanOrEqualTo($twoWeeksLater)) {
                            session()->flash('expiredAlert', true);
                            session()->flash('expiredDate', "App will be blocked at " . $data['data']['valid_until']);
                        }
                    }
                }
                if (!$serial  && !$request->is('error')) {
                    return redirect()->route('error')->with('isExpired', true);
                }
                $serial = Serial::first();

                // Check the local serial expiry
                $expiryDate = Carbon::parse($serial->valid_until);

                // Check if the serial is expired
                if ($expiryDate->lessThanOrEqualTo(Carbon::yesterday()) && !$request->is('error')) {
                    return redirect()->route('error')->with('isExpired', true);
                }

                // Set alert if expiring soon
                if ($expiryDate->lessThanOrEqualTo($twoWeeksLater)) {
                    session()->flash('expiredAlert', true);
                    session()->flash('expiredDate', "App will be blocked at " . $serial->valid_until);
                }
            }
        }

        return $next($request);
    } -->
