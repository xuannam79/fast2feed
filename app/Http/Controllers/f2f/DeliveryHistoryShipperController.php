<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Account;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePassRequest;

class DeliveryHistoryShipperController extends Controller
{
    public function index()
    {
    	return view('f2f.accountShipperInfo.deliveryHistory');
    }
}
