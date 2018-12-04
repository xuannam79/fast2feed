<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Account;
use App\Model\Admin\Cat;
class accountController extends Controller
{
	public function __construct(Account $acc, Cat $cat)
	{
		$this->acc = $acc;
		$this->cat = $cat;
	}
    public function index()
    {
    	$getCatOffset0 = $this->cat->getCatOffset0();
        $getCatOffset2 = $this->cat->getCatOffset2();
    	return view('f2f.account.index', 'getCatOffset0', 'getCatOffset2');
    }
}
