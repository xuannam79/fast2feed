<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Restaurant extends Model
{
    protected $table = "restaurant";
    protected $primarykey = "restaurant_id";
    public $timestamps = false;

    public function getItem($accId)
    {
        if(session()->has('admin')){
             $id = session()->get('admin')[0]->account_id;
        }
        return DB::table('restaurant')
        ->join('account', 'account.account_id', '=', 'restaurant.account_id')
        ->where('account.account_id', $accId)
        ->get();
    }
}
