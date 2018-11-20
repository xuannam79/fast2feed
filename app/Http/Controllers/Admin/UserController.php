<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Account;

class UserController extends Controller
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
        } 
    	$accounts = $this->account->getAll();
    	return view('admin.user.index', compact('accounts', 'getAdmin'));
    }
    public function getAdd()
    {
    	return view('admin.user.add');
    }
}



