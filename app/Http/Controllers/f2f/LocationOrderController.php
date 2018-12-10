<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Order;
use App\Model\Admin\Shipper;
use App\Http\Controllers\Controller;

class LocationOrderController extends Controller
{
	public function __construct(Shipper $shipper, Order $order)
	{
		$this->shipper = $shipper;
        $this->order = $order;
	}
    public function index($slug, $orderID)
    {
    	$getService = $this->order->getHD($orderID);
    	return view('f2f.accountInfo.locationOrder',compact('getService'));
    }
}
