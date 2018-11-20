<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Comment extends Model
{
    protected $table = "comment";
    protected $primarykey = "comment_id";
    public $timestamp = false;

    public function getAll()
    {
    	return DB::table('comment')->join('product', 'comment.product_id', '=', 'product.product_id')->join('customer', 'comment.customer_id', '=', 'customer.customer_id')->select('comment.*', 'product.product_name', 'customer.customer_name')->get();
    	
    }
}
