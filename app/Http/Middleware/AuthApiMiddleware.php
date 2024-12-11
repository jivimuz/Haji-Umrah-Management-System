<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

use App\Models\JwtToken;

class AuthApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
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

        return $next($request);
    }
}
