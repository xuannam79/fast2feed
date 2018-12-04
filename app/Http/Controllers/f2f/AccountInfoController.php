<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Cat;
use App\Http\Controllers\Controller;

class AccountInfoController extends Controller
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
        $getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
        $getAccountInfo = $this->account->accountInfo($accId);
	    return view('f2f.accountInfo.index', compact('getAdmin', 'getAccountInfo', 'getCatOffset0', 'getCatOffset2'));
    }
}
