<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Cat;
use App\Model\Admin\Account;
use App\Model\Admin\Customer;


class CatController extends Controller
{
	public function __construct(Account $account,Cat $cat, Customer $customer)
	{
		$this->cat = $cat;
		$this->account = $account;
		$this->customer = $customer;
	}
    public function index($slug, $cid)
    {
    	$getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
    	$cats = $this->cat->getAll();
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        }
        $getCusomerByCid = $this->customer->getCusomerByCid($cid);
        $getCat = $this->cat->getItem($cid);
    	return view('f2f.cat.index',compact('cats', 'getCatOffset0', 'getCatOffset2', 'getAdmin', 'getCusomerByCid', 'getCat'));

    }

}
