<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Cat;
use App\Http\Requests\CatRequest;
use App\Model\Admin\Account;


class CatController extends Controller
{
	public function __construct(Cat $cat, Account $account)
	{
        $this->account = $account;
		$this->cat = $cat;
	}
    public function index()
    {
    	$cats = $this->cat->getAll();
        if(session()->has('admin')){
            $mail = session()->get('admin')[0]->email;
            $getAdmin = $this->account->getAccount($mail);
            return view('admin.cat.index',compact('getAdmin', 'cats'));
        }else{
            return view('admin.cat.index',compact('cats'));
        }   
    }
    public function getAdd()
    {
        if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        }  
    	return view('admin.cat.add', compact('getAdmin'));
    }
    public function postAdd(CatRequest $request){
        $catname = $request->catname;
        $arItem['catalog_name'] = $catname;
        $resultAdd = $this->cat->addItem($arItem);
        if ($resultAdd) {
            return redirect(route('catAdmin'))->with('msg','Thêm thành công');
        } else {
            return redirect(route('catAdmin'))->with('msg','Lỗi khi thêm');
        }
    }
    public function getEdit($cid)
    {
        $objCat = $this->cat->getItem($cid);
        return view('admin.cat.edit', compact('objCat'));
    }
    public function postEdit($cid, CatRequest $request)
    {
        $objCat = $this->cat->getItem($cid);
        $catname = $request->catname;
        $arItem['catalog_name'] = $catname;
        $resultEdit = $this->cat->editItem($cid, $arItem);
        if ($resultEdit) {
            return redirect(route('catAdmin'))->with('msg','Sửa thành công');
        } else {
            return redirect(route('catAdmin'))->with('msg','Lỗi khi sửa');
        }
    }
    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $presentStatus = $request->presentStatus;
        $this->cat->updateStatus($id, $presentStatus);
        return view('admin.cat.ajaxToggleActive', compact('presentStatus', 'id'));
    }
    // test
}
