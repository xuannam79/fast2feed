<?php

namespace App\Http\Controllers\f2f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DinhViMapController extends Controller
{
    public function index()
    {
    	return view('f2f.dinhViMap.index');
    }
}
