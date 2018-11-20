<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Cat;


class CatController extends Controller
{
	public function __construct(Cat $cat)
	{
		$this->cat = $cat;
	}
    public function index()
    {
    	$cats = $this->cat->getAll();
    	return view('f2f.cat.index',compact('cats'));

    }
}
