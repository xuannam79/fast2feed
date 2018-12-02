<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Shipper;
use App\Http\Controllers\Controller;

class ShipperController extends Controller
{
	public function __construct(Account $account, Shipper $shipper)
	{
        $this->account = $account;
		$this->shipper = $shipper;
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
         return view('f2f.shipper.edit-profile');
      }
    public function accountInfo()
    {
        if(session()->has('admin')){
            $mail = session()->get('admin')[0]->email;
            $getAdmin = $this->account->getAccount($mail);
            if(session()->get('admin')[0]->role == 3){
                $getShipper = $this->shipper->getShipperByEmail($mail);

            }
        }
        return view('f2f.accountShipperInfo.index', compact('getAdmin', 'getShipper'));
    }
}
