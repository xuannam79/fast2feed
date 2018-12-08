<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Account;
use App\Model\Admin\Cat;
use App\Model\Admin\Menu;
use App\Model\Admin\Customer;
use App\Model\Admin\Product;
use App\Http\Requests\PostProductRequest;

class PostProductController extends Controller
{
	public function __construct(Cat $cat,Account $account, Menu $menu, Customer $customer, Product $product)
	{
		$this->cat = $cat;
        $this->account = $account;
        $this->menu = $menu;
        $this->customer = $customer;
		$this->product = $product;
	}
    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
             $idAcc = session()->get('admin')[0]->account_id;
        } 
        $cats = $this->cat->getAll();
        $getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
        $getCusByAccid = $this->customer->getCusByAccid($idAcc);
        $menus = $this->menu->getItem($getCusByAccid->customer_id);
    	return view('f2f.restau.postProduct', 
            compact('cats', 'getAdmin', 'getCatOffset0', 'getCatOffset2', 'menus'));
    }
    public function postProduct(PostProductRequest $request)
    {
        if(session()->has('admin')){
             $idAcc = session()->get('admin')[0]->account_id;
        }
        $getCusByAccid = $this->customer->getCusByAccid($idAcc);
        $cusID = $getCusByAccid->customer_id;
        $cusName = $getCusByAccid->customer_name;
        $slug = str_slug($cusName);

        $name = $request->name;
        $price = $request->price;
        $amount = $request->amount;
        $cat = $request->cat;
        $menu = $request->menu;
        $preparetion_time = $request->time;
        
        $images = $request->file('images');
        $time = time();
        $end_file = $images->getClientOriginalExtension();
        $file_name = 'Product-'.$time.'.'.$end_file;
        $images->move('files/product', $file_name);

        $arrPost['name'] = $name;
        $arrPost['price'] = $price;
        $arrPost['amount'] = $amount;
        $arrPost['cat'] = $cat;
        $arrPost['menu'] = $menu;
        $arrPost['images'] = $file_name;
        $arrPost['time'] = $preparetion_time;
        $arrPost['cusID'] = $getCusByAccid->customer_id;

        $resultProduct = $this->product->postProduct($arrPost);
        if($resultProduct){
            return redirect(route('trangCustomer', ['slug' => $slug, 'cusId' => $cusID]))->with('msg','Thêm sản phẩm thành công');
        }else{
            return redirect(route('trangpostProduct'))->with('msg','Thêm sản phẩm không thành công');
        }
    }
}
