<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Shipper;
use App\Http\Controllers\Controller;

class ShipperController extends Controller
{
	public function __construct(Shipper $shipper,Account $account)
	{
        $this->shipper = $shipper;
		$this->account = $account;
	}
    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        }
        $shippers = $this->shipper->getAll();
    	return view('admin.shipper.index',compact('shippers', 'getAdmin'));
    }
    
}
