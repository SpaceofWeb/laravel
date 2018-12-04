<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class APIToken
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
        $token = $request->header('Authorization');
        $token = str_replace('Bearer ', '', $token);

        $u = User::where('remember_token', $token)->first();

        if ($u) return $next($request);

        return response()->json([
            'status'=> true,
            'message'=> 'unauthorized'
        ])->setStatusCode(401, 'unauthorized');
    }
}

