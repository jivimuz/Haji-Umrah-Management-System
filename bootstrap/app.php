<?php

use App\Http\Middleware\AuthApiMiddleware;
use App\Http\Middleware\CheckModuleAccess;
use App\Http\Middleware\SerialAuthorization;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Add Middleware API
        $middleware->append(AuthApiMiddleware::class);
        $middleware->alias([
            'checkAccess' => CheckModuleAccess::class,
            'p' => SerialAuthorization::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Add Exception For API
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => $e->getMessage(),
                ], 401);
            }
        });
    })->create();
