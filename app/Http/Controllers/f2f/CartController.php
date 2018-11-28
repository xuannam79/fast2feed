<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Account;
use App\Model\Admin\Cat;

class CartController extends Controller
{
	public function __construct(Cat $cat,Account $account)
	{
		$this->cat = $cat;
		$this->account = $account;
	}

    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        } 
    	$cats = $this->cat->getAll();
    	return view('f2f.cart.index', compact('cats','getAdmin'));
    }
    public function postCart(Request $request)
    {
    	$id = $request->id;
    	$name = $request->name;
    	$price = $request->price;
    	dd($request);
    	
    }
}
