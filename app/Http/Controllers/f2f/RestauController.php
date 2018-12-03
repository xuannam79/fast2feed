<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Customer;
use App\Model\Admin\Account;
use App\Model\Admin\Menu;
use App\Model\Admin\Product;

class RestauController extends Controller
{
	public function __construct(Customer $customer, Menu $menu,Account $account, Product $product)
	{
		$this->customer = $customer;
        $this->account = $account;
        $this->menu = $menu;
		$this->product = $product;
	}
    public function index($slug, $cusId)
    {
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        } 
    	$getCustomer = $this->customer->getItem($cusId);
    	$getMenu = $this->menu->getItem($cusId);
        $getProduct = $this->product->getProductById($cusId);
    	return view('f2f.restau.index', compact('getCustomer', 'getMenu', 'getAdmin', 'getProduct'));
    }
    public function postProduct(Request $request, $slug, $cusId)
    {
        $getCustomer = $this->customer->getItem($cusId);
        $slug = str_slug($getCustomer->customer_name);
        $cusId = $getCustomer->customer_id;
        $idProduct = $request->idProduct;
        $nameProduct = $request->name;
        $priceProduct = $request->price;
        $imagesProduct = $request->images;
        $amountProduct = $request->amount;
        $arrName = 'arrCart'.$cusId;
        if(session()->has('admin')){
            if (session()->has($arrName)){
                $arrCart = $request->session()->get($arrName);
                if (!array_key_exists($idProduct, $arrCart)) {
                    $tmp = 0;
                    $aCart = array(
                        $idProduct => array(
                            'nameProduct' => $nameProduct,
                            'amountProduct' => $amountProduct,
                            'imagesProduct' => $imagesProduct,
                            'priceProduct' => $priceProduct
                        ),
                    );
                    $arrCart = $arrCart + $aCart;
                    $request->session()->put($arrName, $arrCart);
                    return view('f2f.restau.ajaxToggleCart', compact('idProduct', 'nameProduct', 'amountProduct', 'priceProduct', 'tmp'));
                } else {
                    $tmp = 1;
                    $arrCart = $request->session()->get($arrName);
                    $arrCart[$idProduct]['amountProduct'] = $arrCart[$idProduct]['amountProduct'] + $amountProduct;
                    $newAmount = $arrCart[$idProduct]['amountProduct'];
                    $newCountPrice = $newAmount * $arrCart[$idProduct]['priceProduct'];
                    
                    $request->session()->put($arrName,$arrCart);
                    return view('f2f.restau.ajaxToggleCart', compact('newAmount', 'tmp', 'idProduct','newCountPrice'));
                }
            } else {
                $tmp = 0;
                $arrCart = array(
                    $idProduct => array(
                        'nameProduct' => $nameProduct,
                        'amountProduct' => $amountProduct,
                        'imagesProduct' => $imagesProduct,
                        'priceProduct' => $priceProduct
                    ),
                );

                $request->session()->put($arrName, $arrCart);
                return view('f2f.restau.ajaxToggleCart', compact('idProduct', 'nameProduct', 'amountProduct', 'priceProduct', 'tmp'));
            }
        } else {
            return redirect()->route('trangDangNhap');
        }
    }

}
