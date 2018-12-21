<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Model\Admin\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegisterShipperController extends Controller
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
        return view('auth.registerShipper.index');
    }
    public function postRegister(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'required',
            'fullname' => 'required',
            'repassword' => 'required|same:password',
            'address' => 'required',
            'driving_license' => 'required',
            'identity_card' => 'required'
        ],[
            'username.required' => 'Bạn chưa nhập username',
            'email.required' => 'Bạn chưa nhập email',
            'fullname.required' => 'Bạn chưa nhập tên đầy đủ',
            'password.required' => 'Bạn chưa nhập password',
            'repassword.required' => 'Vui lòng nhập lại mật khẩu',
            'repassword.same' => 'Password không khớp',
            'avatar.required' => 'Bạn chưa thêm avatar',
            'address.required' => 'Bạn chưa nhập address',
            'driving_license.required' => 'Bạn chưa nhập driving_license',
            'identity_card.required' => 'Bạn chưa nhập identity_card'
        ]);
        $username = $request->username;
        $email = $request->email;
        $fullname = $request->fullname;
        $password = md5($request->password);

        $avatar = $request->file('avatar');
        $time = time();
        $end_file = $avatar->getClientOriginalExtension();
        $file_name = 'Account-'.$time.'.'.$end_file;
        $avatar->move('files/account', $file_name);

        $address = $request->address;
        $driving_license = $request->driving_license;
        $identity_card = $request->identity_card;



        $arrRegister['username'] = $username;
        $arrRegister['email'] = $email;
        $arrRegister['password'] = $password;
        $arrRegister['avatar'] = $file_name;

        $resultAddPerson = DB::table('personal_account')->insert([
                                                        'money' => '0',
                                                        'status' => '1',
                                                        'EXP' => '2020-02-12', 
                                                        'number' => '2542369852145741'
                                                        ]);

        $resultRegis = $this->account->register($arrRegister);
        if($resultRegis && $resultAddPerson){
            $newAccID = DB::table('account')->max('account_id');
            $personal_id = DB::table('personal_account')->max('personal_id');
            $resultAddShi = DB::table('shipper')->insert([
                                                        'shipper_name' => $fullname,
                                                        'email' => 'null',
                                                        'phone' => 'null', 
                                                        'birthday' => '2018-02-05', 
                                                        'gender' => 'null',
                                                        'address' => $address, 
                                                        'status' => '1', 
                                                        'driving_license' => $driving_license, 
                                                        'identity_card' => $identity_card, 
                                                        'personal_id' => $personal_id, 
                                                        'location' => 'null', 
                                                        'account_id' => $newAccID,
                                                        'active' => '0',
                                                        ]);
            if($resultAddShi){
                return redirect(route('trangConfirmCode'))->with('msg','Đăng kí thành công');
            }
            
        }else{
            return redirect(route('trangDangKi'))->with('msg','Đăng kí không thành công');
        }
    }
}
