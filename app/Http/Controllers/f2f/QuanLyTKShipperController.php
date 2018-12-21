<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Cat;
use App\Model\Admin\Shipper;
use App\Http\Controllers\Controller;


class QuanLyTKShipperController extends Controller
{
	public function __construct(Account $account, Shipper $shipper, Cat $cat)
	{
		$this->account = $account;
        $this->shipper = $shipper;
		$this->cat = $cat;
	}
    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        }
        $getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
        return view('f2f.accountShipperInfo.capNhat',compact('getAdmin','getCatOffset0','getCatOffset2'));
    }
    
}
