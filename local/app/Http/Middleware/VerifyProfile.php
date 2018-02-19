<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($request->getRequestUri() == "/local/login") {
            if ($request->user()) {
                $user = $request->user();

                // check to see if the user is currently active
                if (empty($user->is_verified)) {
                    Auth::logout();
                    return redirect('/local/auth/unverified/' . $user->id);
                }
            }
        }

        return $response;
    }
}
