<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shipper extends Model
{
    protected $table = "shipper";
    protected $primarykey = "shipper_id";
    public $timestamps = false;

    public function getAll()
    {
    	return DB::table('shipper')->join('account', 'account.account_id', '=', 'shipper.account_id')->get();
    }
    public function getItem($shiId)
    {
    	return DB::table('shipper')->join('account','account.account_id','=','shipper.account_id')->where('shipper_id', $shiId)->first();
    }
    public function getItem2($accId)
    {
        if(session()->has('admin')){
             $id = session()->get('admin')[0]->account_id;
        }
        return DB::table('shipper')
        ->join('account', 'account.account_id', '=', 'shipper.account_id')
        ->where('account.account_id', $accId)
        ->first();
    }
    public function updateStatus($idAcc, $arrShip)
    {
        return $this->where('account_id', $idAcc)->update($arrShip);
    }
    public function getShipperByEmail($email)
    {
        return DB::table('shipper')->join('account', 'account.account_id', '=', 'shipper.account_id')->select('shipper.shipper_name', 'shipper.email', 'shipper.phone', 'account.avatar', 'shipper.birthday', 'shipper.address')->where('shipper.email', $email)->first();
    }
    public function updateInfo2($idAcc,$arrShip )
    {
        return $this->where('account_id', $idAcc)->update($arrShip);

    }
    public function getAllDanhSachHDShipper($accID)
    {
        if(session()->has('admin')){
             $id = session()->get('admin')[0]->account_id;
        }
        return DB::table('shipper')
        ->join('orders',function($join)
            {
                $join->on('orders.shipper_id','=','shipper.shipper_id')
                ->join('customer','customer.customer_id','=','orders.customer_id')
                ->join('restaurant','restaurant.restaurant_id','=','orders.restaurant_id');
            })
        ->select('orders.status','orders.order_id','customer.address','restaurant.address_res','customer.customer_name','restaurant.phone_res','restaurant.restaurant_name','customer.transport_fee','orders.date_create')
        ->where('shipper.account_id', $accID)
        ->orderBy('orders.order_id','DESC')
        ->simplePaginate(5);
    }
}
