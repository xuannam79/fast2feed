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
    public function updateStatus($idAcc, $arrShip)
    {
        return $this->where('account_id', $idAcc)->update($arrShip);
    }
}
