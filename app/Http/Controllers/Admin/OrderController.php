<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Order;
use App\Http\Requests\MenuRequest;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\Account;

class OrderController extends Controller
{
	public function __construct(Order $order, Account $account)
	{
		$this->order = $order;
        $this->account = $account;
	}
    public function index()
    {
    	$getAllDanhSachHD = $this->order->getAllDanhSachHD3();
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        }  
        return view('admin.order.index',compact('getAdmin', 'getAllDanhSachHD'));
    }
    public function getAdd()
    {
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        } 
    	return view('admin.menu.add', compact('getAdmin'));
    }
    public function postAdd(MenuRequest $request)
    {
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        }
        $menuname = $request->menuname;
        $arItem['Menu_name'] = $menuname;
        return view('admin.menu.add', compact('getAdmin'));
    }
    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $presentStatus = $request->presentStatus;
        $this->menu->updateStatusMenu($id, $presentStatus);
        return view('admin.menu.ajaxToggleActiveMenu', compact('presentStatus', 'id'));
    }
    public function getEdit($id)
    {
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        }
        $getEdit = $this->menu->findItem($id);
        return view('admin.menu.edit', compact('getAdmin', 'getEdit'));
    }
    public function postEdit($id, Request $request)
    {
        $name = $request->menuname;
        $arrEdit['menu_name'] = $name;
        $resultEdit = $this->menu->editMenu($id, $arrEdit);
        if($resultEdit){
            return redirect()->route('menuAdmin')->with('msg', 'Sửa thành công');
        } else {
            return redirect()->route('menuAdmin')->with('msg', 'Sửa không thành công');

        }
    }
    public function del($id)
    {
         $objItem = $this->menu->findItem($id);
        if(DB::table('menu')->where('menu_id', $objItem->menu_id)->delete()){
            return redirect(route('menuAdmin'))->with('msg','Xóa thành công');
        } else {
            return redirect(route('menuAdmin'))->with('msg','Xóa không thành công');
        }
    }
}
