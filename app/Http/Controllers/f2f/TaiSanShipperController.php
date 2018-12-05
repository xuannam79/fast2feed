<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Cat;
use App\Http\Controllers\Controller;

class TaiSanShipperController extends Controller
{
    public function __construct(Account $account, Cat $cat)
	{
		$this->account = $account;
        $this->cat = $cat;
	}
    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
             $accId = session()->get('admin')[0]->account_id;
        }
        $getPersonal = $this->account->personal($accId);
        $getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
        return view('f2f.accountShipperInfo.person',compact('getAdmin','getPersonal','getCatOffset0','getCatOffset2'));
    }
}
