<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class LoginSeller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('role') != '1') {
            return redirect()->to('login')->with('gagal', 'Mohon Maaf Silahkan login atau fitur tidak dapat diakses');
        }
        return $next($request);
    }
}