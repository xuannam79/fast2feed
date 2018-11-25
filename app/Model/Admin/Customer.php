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
    	return DB::table('customer')->join('catalog', 'customer.catalog_id', '=', 'catalog.catalog_id')->join('account', 'account.account_id', '=', 'customer.account_id')->get();
    }
    public function getItem($cusId)
    {
    	return DB::table('customer')->join('catalog', 'customer.catalog_id', '=', 'catalog.catalog_id')->join('account', 'account.account_id', '=', 'customer.account_id')->where('customer_id', $cusId)->first();
    }
    public function updateInfo2($idAcc,$arrCus )
    {
        return $this->where('account_id', $idAcc)->update($arrCus);

    }
}
