<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Model\Admin\Account;
use App\Model\Admin\Shipper;
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
    public function __construct(Account $account, Shipper $shipper)
    {
        $this->account = $account;
        $this->shipper = $shipper;
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
        $password = md5($password);
        $getAccount = $this->account->getAccount($email);
        if($this->account->checkAccount($email, $password)){
            $idAcc = $this->account->getAccountByEmail($email)->account_id;
            $roleAcc = $this->account->getAccountByEmail($email)->role;
            $request->session()->put('admin', $getAccount);

            // update active =>1
            if(session()->has('admin')){
                if($roleAcc == 3){
                    $arrShip['active'] = "1";
                    $this->shipper->updateStatus($idAcc, $arrShip);
                }
            }
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
        // update active => 0
        if(session()->has('admin')){
            $email = session()->get('admin')[0]->email;
            $idAcc = $this->account->getAccountByEmail($email)->account_id;
            $roleAcc = $this->account->getAccountByEmail($email)->role;
            if($roleAcc == 3){
                $arrShip['active'] = "0";
                $this->shipper->updateStatus($idAcc, $arrShip);
            }
        }
        // huy session
        $request->session()->flush();
        return redirect(route('trangDangNhap'));

    }
    public function getAdmin(){
        $mail = session()->get('admin')[0]->email;
        $getAdmin = $this->account->getAccount($mail);
    }
}
