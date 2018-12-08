<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Account;
use App\Model\Admin\Cat;
use App\Model\Admin\Menu;
use App\Model\Admin\Customer;

class PostProductController extends Controller
{
	public function __construct(Cat $cat,Account $account, Menu $menu, Customer $customer)
	{
		$this->cat = $cat;
        $this->account = $account;
        $this->menu = $menu;
		$this->customer = $customer;
	}
    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
             $idAcc = session()->get('admin')[0]->account_id;
        } 
        $cats = $this->cat->getAll();
        $getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
        $getCusByAccid = $this->customer->getCusByAccid($idAcc);
        $menus = $this->menu->getItem($getCusByAccid->customer_id);
    	return view('f2f.restau.postProduct', 
            compact('cats', 'getAdmin', 'getCatOffset0', 'getCatOffset2', 'menus'));
    }
}
