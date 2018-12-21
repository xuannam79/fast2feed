<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Customer;
use App\Model\Admin\Account;
use App\Model\Admin\Menu;
use App\Model\Admin\Restaurant;
use App\Model\Admin\Product;
use App\Model\Admin\Shipper;
use App\Http\Requests\AddMenuRequest;
use App\Model\Admin\Cat;
use App\Model\Admin\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RestauController extends Controller
{
    

	public function __construct(Customer $customer, Menu $menu,Account $account, Product $product, Cat $cat, Restaurant $restaurant, Shipper $shipper, Order $order)
	{
		$this->customer = $customer;
        $this->account = $account;
        $this->menu = $menu;
        $this->product = $product;
        $this->cat = $cat;
        $this->restaurant = $restaurant;
        $this->shipper = $shipper;
		$this->order = $order;
	}
    public function index($slug, $cusId)
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        if(session()->has('admin')){
            $mail = session()->get('admin')[0]->email;
            $getAdmin = $this->account->getAccount($mail);
            $accId = session()->get('admin')[0]->account_id;
            $getRestaurant = $this->restaurant->getItem($accId);
            $getShipper = $this->shipper->getItem2($accId);
        } 
        $getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
        $getCustomer = $this->customer->getItem($cusId);
    	$getMenu = $this->menu->getItem($cusId);
        $getProduct = $this->product->getProductById($cusId);
    	return view('f2f.restau.index', compact('getCustomer', 'getMenu', 'getAdmin', 'getProduct', 'getCatOffset0', 'getCatOffset2','getRestaurant','dt','getShipper'));
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
                            'idProduct' => $idProduct,
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
                    $arrCart[$idProduct]['amountProduct'] = $arrCart[$idProduct]['amountProduct'] + 1;
                    $newAmount = $arrCart[$idProduct]['amountProduct'];
                    $newCountPrice = $newAmount * $arrCart[$idProduct]['priceProduct'];
                    
                    $request->session()->put($arrName,$arrCart);
                    return view('f2f.restau.ajaxToggleCart', compact('newAmount', 'tmp', 'idProduct','newCountPrice'));
                }
            } else {
                $tmp = 0;
                $arrCart = array(
                    $idProduct => array(
                        'idProduct' => $idProduct,
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
    public function addMenu()
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
        return view('f2f.restau.addMenu', compact('cats', 'getCatOffset0', 'getCatOffset2', 'menus', 'getAdmin'));
    }
    public function postAddMenu(AddMenuRequest $request)
    {
        if(session()->has('admin')){
             $idAcc = session()->get('admin')[0]->account_id;
        } 
        $getCusByAccid = $this->customer->getCusByAccid($idAcc);
        $cusName = $getCusByAccid->customer_name;
        $slug = str_slug($cusName);
        $cusID = $getCusByAccid->customer_id;
        
        $name = $request->menu;

        $arrAdd['cusID'] = $cusID;
        $arrAdd['name'] = $name;

        $resultAdd = $this->menu->addMenu($arrAdd);
        if($resultAdd){
            return redirect()->route('trangCustomer', ['slug' => $slug, 'cusId' => $cusID])->with('msg','Thêm menu thành công');
        }else{
            return redirect()->route('trangThemMenu')->with('msg','Thêm menu không thành công');
        }
    }
    public function minusProduct(Request $request, $slug, $cusId)
    {
        $getCustomer = $this->customer->getItem($cusId);
        $slug = str_slug($getCustomer->customer_name);
        $cusId = $getCustomer->customer_id;
        $idProduct = $request->idProduct;
        $amountProduct = $request->amount;
        $arrName = 'arrCart'.$cusId;
        if (session()->has($arrName)){
            $arrCart = $request->session()->get($arrName);
                $arrCart[$idProduct]['amountProduct'] = $arrCart[$idProduct]['amountProduct'] - 1;
                $newAmount = $arrCart[$idProduct]['amountProduct'];
                $newCountPrice = $newAmount * $arrCart[$idProduct]['priceProduct'];
                $request->session()->put($arrName,$arrCart);
        }
    }
    public function plusProduct(Request $request, $slug, $cusId)
    {
        $getCustomer = $this->customer->getItem($cusId);
        $slug = str_slug($getCustomer->customer_name);
        $cusId = $getCustomer->customer_id;
        $idProduct = $request->idProduct;
        $amountProduct = $request->amount;
        $arrName = 'arrCart'.$cusId;
        if (session()->has($arrName)){
            $arrCart = $request->session()->get($arrName);
                $arrCart[$idProduct]['amountProduct'] = $arrCart[$idProduct]['amountProduct'] + 1;
                $newAmount = $arrCart[$idProduct]['amountProduct'];
                $newCountPrice = $newAmount * $arrCart[$idProduct]['priceProduct'];
                $request->session()->put($arrName,$arrCart);
        }
    }
    public function order(Request $request, $slug, $cusId)
    {
        // insert order
        $arrPost['total'] = $request->newtotal;
        $account_id = $request->account_id;
        $arrPost['transport_fee'] = $request->transport_fee;
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $arrPost['date'] = $dt->toDateString();
        $arrPost['time'] = $dt->toTimeString();
        $arrPost['cusID'] = $cusId;
        $resultRes = DB::table('restaurant')->where('account_id', $account_id)->first();
        $arrPost['resID'] = $resultRes->restaurant_id;

        $resultOrder = $this->order->addOrder($arrPost);

        $order_idMAX = DB::table('orders')->max('order_id');

        // insert transaction 
        $arrCart = $request->arrCart;
        
        foreach ($arrCart as $key => $value) {
            DB::table('transaction')->insert(
                [
                'order_id' => $order_idMAX,
                'product_id' => $value['idProduct'],
                'amount' => $value['amountProduct']
                ]);
        }

    }
}
