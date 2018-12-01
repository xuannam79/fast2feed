<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = "orders";
    protected $primarykey = "order_id";
    public $timestamps = false;

    public function getAll()
    {
    	return DB::table('shipper')->join('orders', 'shipper.shipper_id', '=', 'orders.shipper_id')->join('account', 'account.account_id', '=', 'shipper.account_id')->get();
    }
    public function getItem($shiId)
    {
    	return DB::table('orders')->join('shipper','shipper.shipper_id','=','orders.shipper_id')->where('shipper_id', $shiId)->first();
    }
    public function updateStatus($idAcc, $arrShip)
    {
        return $this->where('account_id', $idAcc)->update($arrShip);
    }
}
