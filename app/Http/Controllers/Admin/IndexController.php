<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Account;

class IndexController extends Controller
{
	 public function __construct(Account $account)
    {
        $this->account = $account;
    }
    public function index()
    {
    	if(session()->has('admin')){
    		$mail = session()->get('admin')[0]->email;
            $getAdmin = $this->account->getAccount($mail);
    		return view('admin.index.index',compact('getAdmin'));
        }else{
    		return view('admin.index.index');
        }	
    }
}
