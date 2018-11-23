<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Account;
class accountController extends Controller
{
	public function __construct(Account $acc)
	{
		$this->acc = $acc;
	}
    public function index()
    {
    	return view('f2f.account.index');
    }
}
