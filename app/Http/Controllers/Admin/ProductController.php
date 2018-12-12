<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Account;
use App\Model\Admin\Product;

class ProductController extends Controller
{
	public function __construct(Product $product,Account $account)
	{
        $this->product = $product;
		$this->account = $account;
	}
    public function index()
    {   
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        }  
    	$products = $this->product->getAll();
    	return view('admin.product.index', compact('products', 'getAdmin'));
    }
    public function getAdd()
    {
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        } 
    	return view('admin.product.add', compact('getAdmin'));
    }
    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $presentStatus = $request->presentStatus;
        $this->product->updateStatusProduct($id, $presentStatus);
        return view('admin.product.ajaxToggleActiveProduct', compact('presentStatus', 'id'));
    }
    public function approved()
    {
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        }  
        $products = $this->product->getAll();
        return view('admin.product.approved', compact('products', 'getAdmin'));
    }
}
