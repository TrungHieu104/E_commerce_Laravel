<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //return $next($request);
        // $user = Auth::guard('admin')->user();
        // if ($user && $user->vaitro == 1) { 
        //     return $next($request);
        // }
        // else {
        //     $request->session()->put('prevurl',url()->current());
        //     return redirect(url('login'))
        //         ->with('thongbao','Bạn cần đăng nhập với vai trò admin');
        // }
        if(auth()->check()){

            if(auth()->user()->vaitro == 1) {
                return $next($request);
            } else {
                return redirect('/notif')->with('thongbao', "You aren't authorized to access admin dashboard!");
            }
        }else{
            return redirect('/login');
        }
        

    }
}
