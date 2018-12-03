<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Order;
use App\Http\Controllers\Controller;

class TransactionHistoryAdminController extends Controller
{
    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct(Account $account,Order $order)
    {
        $this->account = $account;
        $this->order = $order;
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
        $getTransactionHistoryAdmin = $this->order->getTransaction();
        return view('admin.customer.transaction',compact('getAdmin','getTransactionHistoryAdmin'));
    }
}
