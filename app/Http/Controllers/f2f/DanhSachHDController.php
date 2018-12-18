<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Shipper;
use App\Model\Admin\Order;
use App\Model\Admin\Transaction;
use App\Model\Admin\Cat;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class DanhSachHDController extends Controller
{
	public function __construct(Account $account, Order $order,Transaction $tran, Cat $cat, Shipper $shipper)
	{
		$this->account = $account;
        $this->order = $order;
        $this->tran = $tran;
        $this->cat = $cat;
        $this->shipper = $shipper;
	}
    public function index()
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
             $accId = session()->get('admin')[0]->account_id;
        }
        $getAllDanhSachHD = $this->order->getAllDanhSachHD();
        $getAmountProduct = $this->order->getAmountProduct();       
    	return view('f2f.danhsachHD.index', compact('getAdmin','getAllDanhSachHD','getAmountProduct','getCatOffset0','getCatOffset2','dt'));
    }
    public function acceptOrder(Request $request)
    {
        $orderID = $request->orderID;
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
             $accId = session()->get('admin')[0]->account_id;
        }
        $getShipper = $this->shipper->getShipperByAccID($accId);
        $shipperID = $getShipper->shipper_id;
        $arrOrder['shipper_id'] = $shipperID;
        $resultAccept = $this->order->acceptOrder($orderID, $arrOrder);

        if($resultAccept) {
            return redirect()->route('trangShipper')->with('msg', 'Đã nhận order');
        } else {
            return redirect()->route('trangDanhSachHD')->with('msg', 'Nhận không thành công');
        }
    }
}
