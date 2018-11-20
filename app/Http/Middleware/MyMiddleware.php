<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class MyMiddleware
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
        if(Session::has('admin')){
            return $next($request);
        }else
            return redirect()->route('trangDangNhap')->with('msg','Vui lòng đăng nhập để vào trang quản trị');
    }
}
