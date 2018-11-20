<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Customer;
use App\Model\Admin\Account;
use App\Model\Admin\Menu;

class RestauController extends Controller
{
	public function __construct(Customer $customer, Menu $menu,Account $account)
	{
		$this->customer = $customer;
        $this->account = $account;
		$this->menu = $menu;
	}
    public function index($slug, $cusId)
    {
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        } 
    	$getCustomer = $this->customer->getItem($cusId);
    	$getMenu = $this->menu->getItem($cusId);
    	return view('f2f.restau.index', compact('getCustomer', 'getMenu', 'getAdmin'));
    }

}
