<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Order;

use App\Http\Controllers\Controller;

class DeliveryHistoryController extends Controller
{
    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct(Order $order,Account $account)
    {
        $this->order = $order;
        $this->account = $account;
    }
    /**
     * Show the application dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        }
        $orders = $this->order->getAll();
        return view('admin.deliveryHistory.index',compact('orders', 'getAdmin'));
    }
}
