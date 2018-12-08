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
        return DB::table('orders')->join('customer', 'customer.customer_id', '=', 'orders.customer_id')->join('restaurant', 'restaurant.restaurant_id', '=', 'orders.restaurant_id')->select('orders.order_id','customer.address','restaurant.address_res')->simplePaginate(1);
    }
    public function getAllDanhSachHD()
    {
        return DB::table('orders')->join('customer',function($join)
            {
                $join->on('customer.customer_id','=','orders.customer_id')
                ->join('account','account.account_id','=','customer.account_id');
            })->join('restaurant', 'restaurant.restaurant_id', '=', 'orders.restaurant_id')->select('orders.status','orders.order_id','customer.address','restaurant.address_res','customer.customer_name','restaurant.phone_res','restaurant.restaurant_name','account.username','customer.transport_fee','orders.date_create')->orderBy('orders.order_id','DESC')->simplePaginate(5);
    }
    public function getHD($order){
        return DB::table('orders')->join('customer',function($join)
            {
                $join->on('customer.customer_id','=','orders.customer_id')
                ->join('account','account.account_id','=','customer.account_id');
            })
        ->join('restaurant', 'restaurant.restaurant_id', '=', 'orders.restaurant_id')
        ->select('orders.status','orders.order_id','customer.address','restaurant.address_res','customer.customer_name','restaurant.phone_res','restaurant.restaurant_name','account.username','customer.transport_fee','orders.date_create','orders.time')
        ->where('orders.order_id', $order)
        ->first();
    }
    public function getAmountProductHD($order)
    {
        return DB::table('transaction')->join('orders', 'transaction.order_id', '=', 'orders.order_id')->join('product', 'product.product_id', '=', 'transaction.product_id')->select('transaction.order_id','transaction.amount','product.product_name','product.price','orders.transport_fee_order','orders.total')->where('orders.order_id', $order)->first();
    }
    public function getAllDanhSachHD2()
    {
        return DB::table('orders')->join('customer',function($join)
            {
                $join->on('customer.customer_id','=','orders.customer_id')
                ->join('account','account.account_id','=','customer.account_id');
            })->join('restaurant', 'restaurant.restaurant_id', '=', 'orders.restaurant_id')->select('orders.status','orders.order_id','customer.address','restaurant.address_res','customer.customer_name','restaurant.phone_res','restaurant.restaurant_name','account.username','customer.transport_fee','orders.date_create')->orderBy('orders.order_id','DESC')->simplePaginate(1);
    }  

    public function getAmountProduct()
    {
        return DB::table('transaction')->join('orders', 'transaction.order_id', '=', 'orders.order_id')->join('product', 'product.product_id', '=', 'transaction.product_id')->select('transaction.order_id','transaction.amount','product.product_name','product.price','orders.transport_fee_order','orders.total')->get();
    }
    public function updateStatus($idAcc, $arrShip)
    {
        return $this->where('account_id', $idAcc)->update($arrShip);
    }
}
