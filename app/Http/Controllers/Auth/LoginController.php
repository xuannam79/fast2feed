<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Model\Admin\Account;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Account $account)
    {
        $this->account = $account;

        $this->middleware('guest')->except('logout');
    }
    public function getLogin()
    {
        return view('auth.login.index');
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập password'
        ]);
        //dd(session('admin'));
        $email = trim($request->email);
        $password = trim($request->password);
        $getAccount = $this->account->getAccount($email);
        if($this->account->checkAccount($email, $password)){
            $request->session()->put('admin', $getAccount);
            
            if($email == 'xnam7799@gmail.com'){
                return redirect(route('trangChuAdmin'))->with('msg','Xin chào Admin');
            }else{
                return redirect(route('trangChu'));
            }

        }else{
            return redirect(route('trangDangNhap'))->with('msg','Sai email hoặc password');

        }
        
    }   
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect(route('trangDangNhap'));

    }
    public function getAdmin(){
        $mail = session()->get('admin')[0]->email;
        $getAdmin = $this->account->getAccount($mail);
    }
}
