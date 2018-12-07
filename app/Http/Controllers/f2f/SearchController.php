<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Account;
use App\Model\Admin\Customer;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\Cat;
class SearchController extends Controller
{


	public function __construct(Account $acc, Cat $cat, Customer $customer)
	{
		$this->acc = $acc;
        $this->cat = $cat;
        $this->customer = $customer;
	}
    public function index()
    {
        $cats = $this->cat->getAll();
        $getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->acc->getAccount($mail);
        } 
    	return view('f2f.search.index', compact('cats', 'getCatOffset0', 'getCatOffset2', 'getAdmin'));
    }
    public function postSearch(Request $request)
    {
        $getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
        $cats = $this->cat->getAll();
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->acc->getAccount($mail);
        } 
        $keySearch = $request->searchinput;
        $getSearch = DB::table('customer')
                    ->join('product', 'product.customer_id', '=', 'customer.customer_id')
                    ->join('catalog', 'catalog.catalog_id', '=', 'customer.catalog_id')
                    ->select('customer.customer_id', 'product.product_name', 'customer.customer_name', 'customer.images', 'customer.address', 'catalog.catalog_name')
                    ->where('customer.customer_name', 'like', "%$keySearch%")

                    ->orWhere('product.product_name', 'like', "%$keySearch%")
                    ->get();
        $newArrSearch = array(); 
        foreach ($getSearch as $val) { 
            $newArrSearch[$val->customer_id] = $val;  
        } 
        $getSearch = array_values($newArrSearch); 
        return view('f2f.search.index', compact('getSearch', 'cats', 'getCatOffset0', 'getCatOffset2', 'getAdmin', 'keySearch'));
    }
}
