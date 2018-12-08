<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Order;
use App\Model\Admin\Transaction;
use App\Model\Admin\Cat;
use App\Http\Controllers\Controller;

class DetailShipperController extends Controller
{
    public function __construct(Account $account, Order $order,Transaction $tran, Cat $cat)
    {
        $this->account = $account;
        $this->order = $order;
        $this->tran = $tran;
        $this->cat = $cat;
    }
    public function index($slug, $orderID)
    {
        
        $getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
             $accId = session()->get('admin')[0]->account_id;
        }
        $getAllDanhSachHD = $this->order->getHD($orderID);
        $getAllDanhSachHD2 = $this->order->getAllDanhSachHD2();
        $getAmountProduct = $this->order->getAmountProduct();    
        return view('f2f.shipper.detail', compact('getAdmin','getAllDanhSachHD','getAmountProduct','getCatOffset0','getCatOffset2','getAllDanhSachHD2'));
    }
}
