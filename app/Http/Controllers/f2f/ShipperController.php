<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Shipper;
use App\Model\Admin\Order;
use Illuminate\Support\Facades\DB;
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
             $accId = session()->get('admin')[0]->account_id;
        }  
        $getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
        $getAllDanhSachHD = $this->shipper->getAllDanhSachHDShipper($accId);
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
    public function cancelOrder(Request $request)
    {
        $orderID = $request->orderID;
        $resultCancel = DB::table('orders')
                        ->where('order_id', $orderID)
                        ->update(['shipper_id' => 0]);
        if($resultCancel) {
            return redirect()->route('trangDanhSachHD')->with('msg', 'Đã hủy order');
        } else {
            return redirect()->route('trangShipper')->with('msg', 'Hủy không thành công');
        }
    }
    public function delivered(Request $request)
    {
        $orderID = $request->orderID;
        $resultDelivered = DB::table('orders')
                        ->where('order_id', $orderID)
                        ->update(['status_2' => 2]);
        if($resultDelivered) {
            return redirect()->route('trangShipper')->with('msg', 'Cám ơn bạn! Bạn vất vả rồi ^^');
        } else {
            return redirect()->route('trangShipper')->with('msg', 'Xác nhận không thành công');
        }
    }
}
