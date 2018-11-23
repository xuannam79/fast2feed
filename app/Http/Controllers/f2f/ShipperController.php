<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Http\Controllers\Controller;

class ShipperController extends Controller
{
	public function __construct(Account $account)
	{
		$this->account = $account;
	}
    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        }  
    	return view('f2f.shipper.index', compact('getAdmin'));
    }
    public function getProfile(){
         return view('f2f.shipper.get-profile');
      }
}
