<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    protected $table = "customer";
    protected $primarykey = "customer_id";
    public $timestamps = false;

    public function getAll()
    {
    	return DB::table('customer')->join('catalog', 'customer.catalog_id', '=', 'catalog.catalog_id')->join('account', 'account.account_id', '=', 'customer.account_id')->offset(0)->limit(8)->orderBy('customer.customer_id', 'DESC')->get();
    }
    public function getItem($cusId)
    {
    	return DB::table('customer')->join('catalog', 'customer.catalog_id', '=', 'catalog.catalog_id')->join('account', 'account.account_id', '=', 'customer.account_id')->where('customer_id', $cusId)->first();
    }
    public function updateInfo2($idAcc,$arrCus )
    {
        return $this->where('account_id', $idAcc)->update($arrCus);

    }
    public function getCusomerById()
    {
    }
    public function getCusomerByCid($Cid)
    {
        return DB::table('customer')->join('catalog', 'customer.catalog_id', '=', 'catalog.catalog_id')->where('customer.catalog_id', $Cid)->get();
    }
    public function getAllCat()
    {
        return DB::table('customer')->join('catalog', 'customer.catalog_id', '=', 'catalog.catalog_id')->orderBy('customer.customer_id', 'DESC')->get();
    }
    public function getCusByAccid($idAcc)
    {
        return DB::table('customer')
        ->join('account', 'account.account_id', '=', 'customer.account_id')
        ->where('customer.account_id', $idAcc)
        ->first();
    }
    
    public function getAllPost()
    {
        return DB::table('customer')->join('account',function($join)
            {
                $join->on('account.account_id','=','customer.account_id')
                ->join('restaurant','restaurant.account_id','=','account.account_id');
            })
        ->select('customer.customer_name','customer.images','customer.address','customer.phone','restaurant.restaurant_name','customer.status_customer')
        ->where('customer.status_customer','=','1')
        ->get();
    }
    public function getAllNoPost()
    {
        return DB::table('customer')->join('account',function($join)
            {
                $join->on('account.account_id','=','customer.account_id')
                ->join('restaurant','restaurant.account_id','=','account.account_id');
            })
        ->select('customer.customer_name','customer.images','customer.address','customer.phone','restaurant.restaurant_name','customer.status_customer')
        ->where('customer.status_customer','=','2')
        ->get();
    }
}
