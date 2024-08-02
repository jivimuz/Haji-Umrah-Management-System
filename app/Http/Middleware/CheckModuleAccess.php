<?php
// app/Http/Middleware/CheckModuleAccess.php

namespace App\Http\Middleware;

use Closure;
use App\Models\Module;

class CheckModuleAccess
{
    public function handle($request, Closure $next, ...$modules)
    {
        $AccessList = explode(',', auth()->user()->access);
        $menuList = Module::whereIn('code', $modules)->whereIn('id', $AccessList)->where('isactive', true)->first();
        if (!$menuList) {
            return redirect()->route('error');
        }

        return $next($request);
    }
}
