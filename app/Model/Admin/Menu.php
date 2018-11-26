<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Menu extends Model
{
    protected $table = "menu";
    protected $primarykey = "menu_id";
    public $timestamps = false;

    public function getAll()
    {
    	return $this->all();
    }
    public function getItem($cusId)
    {
    	return DB::table('menu')->select('menu.menu_name', 'menu.menu_id')->join('customer', 'menu.customer_id', '=', 'customer.customer_id')->where('menu.customer_id', $cusId)->get();
    }
    public function updateStatusMenu($id, $presentStatus){
        if($presentStatus == "1"){
            return DB::table('menu')->where('menu_id', $id)->update(['status' => 0]);
        }
        else{
            return DB::table('menu')->where('menu_id', $id)->update(['status' => 1]);
        }
    }
}
