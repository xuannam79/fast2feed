<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxCartController extends Controller
{
    public function index()
    {
    	return view('f2f.restau.ajaxToggleCart');
    }
}
