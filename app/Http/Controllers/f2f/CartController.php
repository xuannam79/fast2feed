<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Account;
use App\Model\Admin\Cat;

class CartController extends Controller
{
	public function __construct(Cat $cat,Account $account)
	{
		$this->cat = $cat;
		$this->account = $account;
	}

    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        } 
    	$cats = $this->cat->getAll();
    	return view('f2f.cart.index', compact('cats','getAdmin'));
    }
    public function postCart(Request $request)
    {
    	$idProduct = $request->id;
    	$nameProduct = $request->name;
    	$priceProduct = $request->price;
    	$amountProduct = $request->amount;
		if (session()->has('arrCart')){
            $arrCart = $request->session()->get('arrCart');
            if (!array_key_exists($idProduct, $arrCart)) {
                $aCart = array(
                    $idProduct => array(
                        'nameProduct' => $nameProduct,
                        'amountProduct' => $amountProduct,
                        'priceProduct' => $priceProduct
                    ),
                );
                $arrCart = $arrCart + $aCart;
                $request->session()->put('arrCart', $arrCart);
            } else {
                $arrCart = $request->session()->get('arrCart');
                $arrCart[$idProduct]['amountProduct'] = $arrCart[$idhoa]['amountProduct'] + $amountProduct;
                $request->session()->put('arrCart',$arrCart);
            }
    	} else {
    		$arrCart = array(
                $idProduct => array(
                    'nameProduct' => $nameProduct,
                    'amountProduct' => $amountProduct,
                    'priceProduct' => $priceProduct
                ),
            );
            $request->session()->put('arrCart', $arrCart);
    	}
		dd(session()->get('arrCart'));
    }
}
