<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Account;
use App\Model\Admin\Cat;
class SearchController extends Controller
{
	public function __construct(Account $acc, Cat $cat, Account $account)
	{
		$this->acc = $acc;
        $this->cat = $cat;
		$this->account = $account;
	}
    public function index()
    {
        $cats = $this->cat->getAll();
        $getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        } 
    	return view('f2f.search.index', compact('cats', 'getCatOffset0', 'getCatOffset2', 'getAdmin'));
    }
    public function postSearch()
    {
        
    }
}
