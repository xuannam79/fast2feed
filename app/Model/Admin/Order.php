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
        return DB::table('orders')->join('customer', 'customer.customer_id', '=', 'orders.customer_id')->join('restaurant', 'restaurant.restaurant_id', '=', 'orders.restaurant_id')->select('orders.order_id','customer.address','restaurant.address_res','restaurant.restaurant_name','customer.customer_name','orders.date_create','orders.total','orders.status','orders.status_2')->orderBy('orders.order_id','DESC')->get();
    }
    public function getAllDanhSachHD()
    {
        return DB::table('orders')->join('customer',function($join)
            {
                $join->on('customer.customer_id','=','orders.customer_id')
                ->join('account','account.account_id','=','customer.account_id');
            })->join('restaurant', 'restaurant.restaurant_id', '=', 'orders.restaurant_id')->select('orders.status','orders.order_id','customer.address','restaurant.address_res','customer.customer_name','restaurant.phone_res','restaurant.restaurant_name','account.username','customer.transport_fee','orders.date_create','orders.status_2','orders.shipper_id')->where('orders.shipper_id','=','0')->orderBy('orders.order_id','DESC')->simplePaginate(5);
    }

    public function getAllDanhSachHD2()
    {
        return DB::table('orders')->join('customer',function($join)
            {
                $join->on('customer.customer_id','=','orders.customer_id')
                ->join('account','account.account_id','=','customer.account_id');
            })->join('restaurant', 'restaurant.restaurant_id', '=', 'orders.restaurant_id')->select('orders.status','orders.order_id','customer.address','restaurant.address_res','customer.customer_name','restaurant.phone_res','restaurant.restaurant_name','account.username','customer.transport_fee','orders.date_create')->orderBy('orders.order_id','DESC')->simplePaginate(1);
    }
    public function getAllDanhSachHD3()
    {
        return DB::table('orders')
        ->select('orders.status','orders.order_id','orders.date_create','orders.shipper_id','orders.status_2')
        ->orderBy('orders.order_id','DESC')
        ->get();
    }
    public function getHD($order){
        return DB::table('orders')->join('customer',function($join)
            {
                $join->on('customer.customer_id','=','orders.customer_id')
                ->join('account','account.account_id','=','customer.account_id');
            })
        ->join('restaurant', 'restaurant.restaurant_id', '=', 'orders.restaurant_id')
        ->select('orders.status','orders.order_id','customer.address','restaurant.address_res','customer.customer_name','restaurant.phone_res','restaurant.restaurant_name','account.username','customer.transport_fee','orders.date_create','orders.time','orders.transport_fee_order','orders.total')
        ->where('orders.order_id', $order)
        ->first();
    }
    public function getAmountProductHD($order)
    {
        return DB::table('transaction')->join('orders', 'transaction.order_id', '=', 'orders.order_id')->join('product', 'product.product_id', '=', 'transaction.product_id')->select('transaction.order_id','transaction.amount','product.product_name','product.price','orders.transport_fee_order','orders.total')->where('orders.order_id', $order)->first();
    }  

    public function getAmountProduct()
    {
        return DB::table('transaction')->join('orders', 'transaction.order_id', '=', 'orders.order_id')->join('product', 'product.product_id', '=', 'transaction.product_id')->select('transaction.order_id','transaction.amount','product.product_name','product.price','orders.transport_fee_order','orders.total')->get();
    }
    public function updateStatus($idAcc, $arrShip)
    {
        return $this->where('account_id', $idAcc)->update($arrShip);
    }
    public function getServiceDirection($order){
        return DB::table('orders')
        ->join('customer','customer.customer_id','=','orders.customer_id')
        ->join('restaurant','restaurant.restaurant_id','=','orders.restaurant_id')
        ->select('customer.address','restaurant.address_res')
        ->where('orders.order_id', $order)
        ->first();
    }
    public function acceptOrder($orderID, $arrOrder)
    {
        return DB::table('orders')
        ->where('order_id', $orderID)
        ->update([
                'shipper_id' => $arrOrder['shipper_id'],
                'status_2' => 1
                ]);
    }   
    public function addOrder($arrPost)
    {
        return DB::table('orders')->insert(
                                    [
                                    'status' => '1',
                                    'payment' => '1',
                                    'date_create' => $arrPost['date'],
                                    'customer_id' => $arrPost['cusID'],
                                    'shipper_id' => '0',
                                    'status_2' => '2',
                                    'total' => $arrPost['total'],
                                    'restaurant_id' => $arrPost['resID'],
                                    'transport_fee_order' => $arrPost['transport_fee'],
                                    'time' => $arrPost['time']
                                    ]);
    }
}
