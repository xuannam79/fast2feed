<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Cat;
use App\Model\Admin\Account;


class CatController extends Controller
{
	public function __construct(Account $account,Cat $cat)
	{
		$this->cat = $cat;
		$this->account = $account;
	}
    public function index()
    {
    	$getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
    	$cats = $this->cat->getAll();
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        } 
    	return view('f2f.cat.index',compact('cats', 'getCatOffset0', 'getCatOffset2', 'getAdmin'));

    }
}
