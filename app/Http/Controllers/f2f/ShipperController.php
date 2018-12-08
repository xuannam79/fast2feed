<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Shipper;
use App\Model\Admin\Order;
use App\Model\Admin\Cat;
use App\Http\Controllers\Controller;

class ShipperController extends Controller
{
	public function __construct(Account $account, Shipper $shipper, Cat $cat, Order $order)
	{
        $this->account = $account;
		$this->shipper = $shipper;
        $this->cat = $cat;
        $this->order = $order;
	}
    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        }  
        $getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
        $getAllDanhSachHD = $this->order->getAllDanhSachHD();
        $getAmountProduct = $this->order->getAmountProduct();
    	return view('f2f.shipper.index', compact('getAdmin','getAllDanhSachHD','getCatOffset0','getCatOffset2','getAmountProduct'));
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
