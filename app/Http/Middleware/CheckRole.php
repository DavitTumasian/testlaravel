<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
//        if($request->user() == ''){
//            return redirect('http://minilaravel.loc/login');
//        } else if($request->user()->role == 'admin')
//        {
//            return $next($request);
//        } else if($request->user()->role == 'user'){
//            return redirect('http://minilaravel.loc/');
//        }

        if($request->user()->role == 'admin'){
            return $next($request);
        }
        return redirect('/home');

    }
}
