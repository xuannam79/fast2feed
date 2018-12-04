<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    protected $table = "transaction";
    public $timestamps = false;

    public function getAll()
    {
    	return DB::table('transaction')->join('orders', 'orders.order_id', '=', 'transaction.order_id')->join('product', 'product.product_id', '=', 'transaction.product_id')->select('transaction.order_id','transaction.price','transaction.amount','product.product_name')->where('transaction.order_id','=','orders.order_id')->get();
    }
}
