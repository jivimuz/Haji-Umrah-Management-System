<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JwtToken extends Model
{
    use HasFactory;
    protected $table = "jwt_token";
    protected $fillable = ['user_id', 'token', 'create_at', 'expire_at', 'is_active'];
    public $timestamps = false;

    static function fnRemoveExpiredToken()
    {
        self::where('expire_at', '<=', now())->delete();
    }

    static function fnDeactiveToken($token)
    {
        self::where('token', $token)->update(['is_active' => false]);
    }

    /**
     * Untuk menonaktifkan semua token user tertentu kecuali satu token yang di provide
     */
    static function fnDeactiveUserTokenExceptOne($user_id, $token)
    {
        self::where('user_id', $user_id)->where('token', '!=', $token)->update(['is_active' => false]);
    }

    static function fnIsTokenActive($token)
    {
        $res = self::select('is_active')->where('token', $token)->first();
        return $res->is_active;
    }
}
