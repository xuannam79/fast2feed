<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    public function getAll()
    {
    	return DB::table('product')->join('catalog', 'product.catalog_id', '=', 'catalog.catalog_id')->join('customer', 'product.customer_id', '=', 'customer.customer_id')->join('menu', 'menu.menu_id', '=', 'product.menu_id')->select('*','product.images')->get();
    	
    }
    public function updateStatusProduct($id, $presentStatus){
        if($presentStatus == "1"){
            return DB::table('product')->where('product_id', $id)->update(['approved' => 0]);
        }
        else{
            return DB::table('product')->where('product_id', $id)->update(['approved' => 1]);
        }
    }
    public function getProductById($cusId)
    {
        return DB::table('product')->where('customer_id', $cusId)->get();
    }
    public function postProduct($arrPost)
    {
        return DB::table('product')->insert(
                                    ['product_name' => $arrPost['name'],
                                    'price' => $arrPost['price'],
                                    'amount' => $arrPost['amount'],
                                    'images' => $arrPost['images'],
                                    'quantify_ordered' => 111,
                                    'preparation_time' => $arrPost['time'],
                                    'menu_id' => $arrPost['menu'],
                                    'customer_id' => $arrPost['cusID'],
                                    'approved' => 0,
                                    'catalog_id' => $arrPost['cat']

                                    ]);
    }
}
