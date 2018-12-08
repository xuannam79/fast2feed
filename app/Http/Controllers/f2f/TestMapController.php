<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Model\Admin\Order;
use App\Http\Controllers\Controller;

class TestMapController extends Controller
{
	public function __construct(Order $order)
	{
        $this->order = $order;
	}
    public function index()
    {
    	$getTransactionHistory = $this->order->getAllDanhSachHD2();
    	return view('f2f.testMap.index',compact('getTransactionHistory'));
    }
}
