<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\Account;

class IndexController extends Controller
{
	 public function __construct(Account $account)
    {
        $this->account = $account;
    }
    public function index()
    {
        $countCus = DB::table('customer')->count();
        $countProduct = DB::table('product')->count();
        $countShipper = DB::table('shipper')->count();
        $countContact = DB::table('contact')->count();
    	if(session()->has('admin')){
    		$mail = session()->get('admin')[0]->email;
            $getAdmin = $this->account->getAccount($mail);
    		return view('admin.index.index',compact('getAdmin', 'countCus', 'countProduct', 'countShipper', 'countContact'));
        }else{
    		return view('admin.index.index', 'countCus', 'countProduct', 'countShipper', 'countContact');
        }	
    }
}
