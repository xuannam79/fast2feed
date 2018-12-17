<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Order;
use App\Model\Admin\Transaction;
use App\Model\Admin\Cat;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class DanhSachHDController extends Controller
{
	public function __construct(Account $account, Order $order,Transaction $tran, Cat $cat)
	{
		$this->account = $account;
        $this->order = $order;
        $this->tran = $tran;
        $this->cat = $cat;
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
             $getOrderByShipper = $this->order->getOrderByShipper($accId);
        }
        $getAllDanhSachHD = $this->order->getAllDanhSachHD();
        $getAmountProduct = $this->order->getAmountProduct();    
        $updateShipperId = $this->order->updateShipperId();    
    	return view('f2f.danhsachHD.index', compact('getAdmin','getAllDanhSachHD','getAmountProduct','getCatOffset0','getCatOffset2','dt','getOrderByShipper','updateShipperId'));
    }
}
