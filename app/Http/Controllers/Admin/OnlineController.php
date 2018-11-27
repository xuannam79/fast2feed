<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Model\Admin\Shipper;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;

class OnlineController extends Controller
{
    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct(Shipper $shipper,Account $account)
    {
        $this->shipper = $shipper;
        $this->account = $account;
        $this->middleware('auth');
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
        $shippers = $this->shipper->getAll();
        return view('admin.online.index',compact('shippers', 'getAdmin'));
    }
}
