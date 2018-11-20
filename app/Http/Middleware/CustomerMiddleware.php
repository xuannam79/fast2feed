<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CustomerMiddleware
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
            $username = session()->get('admin')[0]->username;
            if($username == 'admin'){
                return $next($request);
            }else{
                return redirect()->route('trangChu')->with('msg','Bạn phải là admin để truy cập trang quản trị');
            }
        }else{
            return redirect()->route('trangDangNhap')->with('msg','Vui lòng đăng nhập để vào trang quản trị');
        }
        
    }
}
