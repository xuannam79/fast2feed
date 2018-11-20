<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Menu;
use App\Model\Admin\Account;

class MenuController extends Controller
{
	public function __construct(Menu $menu, Account $account)
	{
		$this->menu = $menu;
        $this->account = $account;
	}
    public function index()
    {
    	$menus = $this->menu->getAll();
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        }  
        return view('admin.menu.index',compact('getAdmin', 'menus'));
    }
    public function getAdd()
    {
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        } 
    	return view('admin.menu.add', compact('getAdmin'));
    }
    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $presentStatus = $request->presentStatus;
        $this->menu->updateStatusMenu($id, $presentStatus);
        return view('admin.menu.ajaxToggleActiveMenu', compact('presentStatus', 'id'));
    }
    
}
