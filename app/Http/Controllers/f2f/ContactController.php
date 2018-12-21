<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Cat;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\Account;

class ContactController extends Controller
{
	public function __construct(Cat $cat, Account $account)
	{
		$this->cat = $cat;
		$this->account = $account;
	}
    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
             $accId = session()->get('admin')[0]->account_id;
        	$getAccountInfo = $this->account->accountInfo($accId);
        } 
    	$getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
    	$cats = $this->cat->getAll();
    	return view('f2f.contact.index', compact('cats', 'getAccountInfo', 'getCatOffset0', 'getCatOffset2', 'getAdmin'));
    }
    public function postContact(ContactRequest $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;
        $mail = $request->mail;
        $content = $request->content;

        if(DB::table('contact')
            ->insert(['contact_name'=>$name, 'address'=>$address, 'phone'=>$phone, 'email'=>$mail,  'content'=>$content]))
        {
            return redirect()->route('trangLienHe')->with('msg', 'Cám ơn bạn đã liên hệ');
        } else {
            return redirect()->route('trangLienHe')->with('msg', 'Liên hệ không thành công');

        }
    }
}
