<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Shipper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePassRequest;

class ChangePassShipperController extends Controller
{
    public function __construct(Account $account, Shipper $shipper)
	{
		$this->account = $account;
		$this->shipper = $shipper;
	}
    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        }
        return view('f2f.accountShipperInfo.changePass',compact('getAdmin'));
    }
}
