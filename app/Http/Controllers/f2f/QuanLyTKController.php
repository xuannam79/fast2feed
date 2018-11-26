<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Customer;
use App\Http\Controllers\Controller;

class QuanLyTKController extends Controller
{
	public function __construct(Account $account, Customer $customer)
	{
		$this->account = $account;
		$this->customer = $customer;
	}
    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
             $accId = session()->get('admin')[0]->account_id;
        } 
        $getAccountInfo = $this->account->accountInfo($accId);
        return view('f2f.quanLyTK.index', compact('getAdmin', 'getAccountInfo'));
    }
    public function postInfo(Request $request)
    {
    	if(session()->has('admin')){
             $idAcc = session()->get('admin')[0]->account_id;
        } 
        // lấy request
    	$username = $request->username;
    	$year = $request->year;
    	$month = $request->month;
    	$day = $request->day;
    	$birthday = $year.'-'.$month.'-'.$day;
    	$email = $request->email;
    	$phone = $request->phone;
    	$address = $request->address;
    	$avatar = $request->file('avatar');
    	$oldAvatar = $this->account->getAccountById($idAcc)->avatar;
    	
    	// upload file hình
    	if(isset($avatar)){
	    	$time = time();
	    	$end_file = $avatar->getClientOriginalExtension();
	    	$file_name = 'Account-'.$time.'.'.$end_file;
	    	$avatar->move('files/account', $file_name);

    	}

    	// thêm dữ liệu vào mảng
    	if(isset($avatar)){
    		$arrAcc['avatar'] = $file_name;
    		$image_path = public_path("files/account/{$oldAvatar}");
    		unlink($image_path);

    	}else $arrAcc['avatar'] = session()->get('admin')[0]->avatar;
    	$arrAcc['username'] = $username;
    	$arrAcc['email'] = $email;

    	$arrCus['birthday'] = $birthday;
    	$arrCus['email'] = $email;
    	$arrCus['phone'] = $phone;
    	$arrCus['address'] = $address;


    	// chạy câu lệnh sql
        $resultInfo = $this->account->updateInfo($idAcc, $arrAcc);
        $resultInfo2 = $this->customer->updateInfo2($idAcc, $arrCus);
        if(isset($avatar)){
        	if($resultInfo){
           	 	return redirect(route('trangTTtaikhoan'))->with('msg','Cập nhật thành công');

        	}else{
            	return redirect(route('trangCapNhatTK'))->with('msg','Cập nhật không thành công');
        	}
        }
        if(isset($birthday) || isset($email) || isset($phone) || isset($address)){
        	if($resultInfo2){
	            return redirect(route('trangTTtaikhoan'))->with('msg','Cập nhật thành công');
	        }else{
	            return redirect(route('trangCapNhatTK'))->with('msg','Cập nhật không thành công');
       		}
        }
        

    }
}
