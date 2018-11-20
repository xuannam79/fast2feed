<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Customer;
use App\Model\Admin\Account;
use App\Model\Admin\Cat;

class IndexController extends Controller
{
	public function __construct(Customer $customer, Cat $cat, Account $account)
	{
		$this->customer = $customer;
        $this->cat = $cat;
		$this->account = $account;

	}
    public function index()
    {
    	$customers = $this->customer->getAll();
    	$cats = $this->cat->getAll();
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        } 
    	return view('f2f.index.index', compact('customers', 'cats', 'getAdmin'));

    }
    

}
