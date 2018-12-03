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
    public function getTransaction()
    {
        return DB::table('orders')->join('customer', 'customer.customer_id', '=', 'orders.customer_id')->get();
    }
    public function getAllDanhSachHD()
    {
        return DB::table('orders')->join('customer',function($join)
            {
                $join->on('customer.customer_id','=','orders.customer_id')
                ->join('account','account.account_id','=','customer.account_id');
            })->select('orders.status','orders.order_id','customer.address','customer.address_res','customer.customer_name','customer.phone_res')->simplePaginate(5);
    }
    public function getAmountProduct()
    {
        return DB::table('transaction')->join('orders', 'transaction.order_id', '=', 'orders.order_id')->join('product', 'product.product_id', '=', 'transaction.product_id')->select('transaction.amount','product.product_name')->get();
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
