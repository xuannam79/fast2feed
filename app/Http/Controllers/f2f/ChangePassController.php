<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Cat;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePassRequest;

class ChangePassController extends Controller
{
	public function __construct(Account $account,Cat $cat)
	{
		$this->account = $account;
	}
    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
             $accId = session()->get('admin')[0]->account_id;
        } 
        $getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
        $getAccountInfo = $this->account->accountInfo($accId);
    	return view('f2f.accountInfo.changePass', compact('getAdmin', 'getAccountInfo', 'getCatOffset0', 'getCatOffset2'));
    }
    public function postChangePass(ChangePassRequest $request)
    {
        if(session()->has('admin')){
             $accId = session()->get('admin')[0]->account_id;
        }
        $oldPass = $this->account->getAccountById($accId)->password;
        $pass = md5($request->pass);
        $newpass = md5($request->newpass);

        if($oldPass == $pass){
            $arrAccount['password'] = $newpass;
            $resultUpdatePass = $this->account->updateInfo($accId, $arrAccount);
            if($resultUpdatePass){
                return redirect()->route('trangTTtaikhoan')->with('msg', 'Thay đổi mật khẩu thành công');
            }else {
                return redirect()->back()->with('msg', 'Đổi mật khẩu không thành công');

            }

        }else {
            return redirect()->back()->with('msg', 'Mật khẩu cũ không đúng');
        }
    }
}
