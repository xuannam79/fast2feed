<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Model\Admin\Account;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function getRegister()
    {
        return view('auth.register.index');
    }
    public function postRegister(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'required'
        ],[
            'username.required' => 'Bạn chưa nhập username',
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập password',
            'avatar.required' => 'Bạn chưa thêm avatar'
        ]);
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;

    	$avatar = $request->file('avatar');
    	$time = time();
    	$end_file = $avatar->getClientOriginalExtension();
    	$file_name = 'Account-'.$time.'.'.$end_file;
    	$avatar->move('files/account', $file_name);

    	$arrRegister['username'] = $username;
  	  	$arrRegister['email'] = $email;
  	  	$arrRegister['password'] = $password;
   	 	$arrRegister['avatar'] = $file_name;

        $resultRegis = $this->account->register($arrRegister);
        if($resultRegis){
            return redirect(route('trangDangNhap'))->with('msg','Đăng kí thành công');
        }else{
            return redirect(route('trangDangKi'))->with('msg','Đăng kí không thành công');
        }
    }
}
