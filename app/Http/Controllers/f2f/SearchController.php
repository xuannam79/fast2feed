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
        // for($i=0;$i<count($getSearch)-1;$i++){
        //        if($getSearch[$i]->customer_id == $getSearch[$i+1]->customer_id){
        //         unset($getSearch[$i]);
        //     }

        // }
        // for($i=count($getSearch)-1;$i>4 ;$i--){
        //        if($getSearch[$i]->customer_id == $getSearch[$i-1]->customer_id){
        //         unset($getSearch[$i]);
        //     }

        // }
        // $copy = $getSearch; // create copy to delete dups from 
        // $usedEmails = array(); // used emails 

        // for($i=0; $i<count($getSearch); $i++) { 

        //     if (in_array($getSearch[$i]->customer_id, $usedEmails)) { 
        //      unset($copy[$i]); 
        //     } 
        //     else { 
        //      $usedEmails[] = $getSearch[$i]->customer_id; 
        //     } 

        // } 
        $newArr = array(); 
        foreach ($getSearch as $val) { 
            $newArr[$val->customer_id] = $val;  
        } 
        $getSearch = array_values($newArr); 

        return view('f2f.search.index', compact('getSearch', 'cats', 'getCatOffset0', 'getCatOffset2', 'getAdmin'));
    }
}
