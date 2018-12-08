<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Account;
use App\Model\Admin\Cat;
use App\Model\Admin\Menu;

class PostProductController extends Controller
{
	public function __construct(Cat $cat,Account $account, Menu $menu)
	{
		$this->cat = $cat;
        $this->account = $account;
		$this->menu = $menu;
	}
    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        } 
        $cats = $this->cat->getAll();
    	$menus = $this->menu->getAll();
        $getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
    	return view('f2f.restau.postProduct', compact('cats', 'getAdmin', 'getCatOffset0', 'getCatOffset2', 'menus'));
    }
}
