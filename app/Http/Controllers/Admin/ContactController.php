<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Account;
use App\Model\Admin\Contact;

class ContactController extends Controller
{
	public function __construct(Contact $contact,Account $account)
	{
		$this->contact = $contact;
		$this->account = $account;
	}
    public function index()
    {
    	if(session()->has('admin')){
             $mail = session()->get('admin')[0]->email;
             $getAdmin = $this->account->getAccount($mail);
        } 
    	$contacts = $this->contact->getAll();
    	return view('admin.contact.index', compact('contacts', 'getAdmin'));
    }
}
