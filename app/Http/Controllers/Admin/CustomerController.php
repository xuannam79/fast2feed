<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Customer;
use App\Model\Admin\Account;

class CustomerController extends Controller
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
    	$customers = $this->customer->getAll();
    	return view('admin.customer.index', compact('customers', 'getAdmin'));
    }
    public function getAdd()
    {
    	return view('admin.customer.add');
    }
}
