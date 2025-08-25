<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAuthRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isLoginRoute = $request->is('login'); // Adjust if your login route is different

        if (!Auth::check()) {
            // Not logged in
            if (!$isLoginRoute) {
                return redirect()->to('login');
            }
        } else {
            // Logged in
            if ($isLoginRoute) {
                return redirect()->to('/');
            }
        }

        return $next($request);
    }
}
