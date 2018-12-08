<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Customer;
use App\Model\Admin\Account;

class ManagePostAdminController extends Controller
{
	public function __construct(Customer $customer,Account $account)
	{
        $this->customer = $customer;
		$this->account = $account;
	}
    public function index()
    {
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        }  
    	$getPost = $this->customer->getAllPost();
        $getNoPost = $this->customer->getAllNoPost();
    	return view('admin.customer.managePost', compact('getPost', 'getAdmin','getNoPost'));
    }
}
