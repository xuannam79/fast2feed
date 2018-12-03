<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Http\Controllers\Controller;

class DeliveryHistoryShipperController extends Controller
{
    public function __construct(Account $account)
	{
		$this->account = $account;
	}
    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
             $accId = session()->get('admin')[0]->account_id;
        }
        $getDeliveryHistory = $this->account->deliveryHistory($accId);
        return view('f2f.accountShipperInfo.deliveryhistory',compact('getAdmin','getDeliveryHistory'));
    }
}
