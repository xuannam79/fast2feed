<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Order;
use App\Http\Controllers\Controller;

class DanhSachHDController extends Controller
{
	public function __construct(Account $account, Order $order)
	{
		$this->account = $account;
        $this->order = $order;
	}
    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
             $accId = session()->get('admin')[0]->account_id;
        }
        $getTransactionHistory = $this->order->getAllDanhSachHD();
        $getAmountProduct = $this->order->getAmountProduct();    
    	return view('f2f.danhsachHD.index', compact('getAdmin','getTransactionHistory','getAmountProduct'));
    }
}
