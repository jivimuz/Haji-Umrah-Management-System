<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\JwtBlacklistToken;
use App\Models\JwtToken;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        auth()->setDefaultDriver('api');
    }

    /**
     * Ceate Credential for Login.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->getMessageBag()], 400);
        }

        $user = User::create([

            'username' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password)
        ]);

        if ($user) {
            return response()->json(['status' => true, 'message' => 'Register successfull, please check your email for validation and wait for admin to activate your account']);
        } else {
            return response()->json(['status' => false, 'message' => 'Register failed, please try again.'], 500);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['status' => false, 'message' => 'Username or Password is invalid'], 401);
        }

        // store login token
        JwtToken::create([
            'user_id' => auth()->user()->id,
            'token' => $token,
            'create_at' => now(),
            'expire_at' => now()->addMinutes(intval(env('JWT_TTL', 60)))
        ]);

        // remove expired token
        JwtToken::fnRemoveExpiredToken();

        // jika ingin single device login, maka panggil function ini.
        // jika tidak diaktifkan maka bisa hit login berkali-kali
        // JwtToken::fnDeactiveUserTokenExceptOne(auth()->user()->id, $token);

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(['status' => true, 'message' => 'success', 'data' => auth()->user()]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $req)
    {
        auth()->logout();

        // deactive token
        JwtToken::fnDeactiveToken($req->bearerToken());

        // remove expired token
        JwtToken::fnRemoveExpiredToken();

        return response()->json(['status' => true, 'message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(Request $req)
    {
        // deactive token
        JwtToken::fnDeactiveToken($req->bearerToken());

        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'status' => true, 'message' => 'success', 'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * intval(env('JWT_TTL', 60))
            ]
        ]);
    }
}
