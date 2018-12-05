<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Shipper;
use App\Model\Admin\Cat;
use App\Http\Controllers\Controller;

class ShipperController extends Controller
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
        $getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
        return view('f2f.accountShipperInfo.index', compact('getAdmin', 'getShipper','getCatOffset0','getCatOffset2'));
    }
}
