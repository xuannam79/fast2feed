<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
    protected $table = "account";
    protected $primarykey = "account_id";
    public $timestamp = false;

    public function getAll()
    {
    	return $this->all();
    }
    public function checkAccount($email,$password)
    {
    	$count = DB::table('account')->where('email', $email)->where('password', $password)->where('status', 1)->count();
    	if($count >= 1){
    		return true;
    	}else{
    		return false;
    	}
    }
    public function getAccount($email)
    {
    	return DB::table('account')->where('email', $email)->get();
    }
    public function register($arrRegister){
        return DB::table('account')->insert(
                        ['username' => $arrRegister['username'],
                        'email' => $arrRegister['email'],
                        'password' => $arrRegister['password'],
                        'avatar' => $arrRegister['avatar'],
                        'status' => 1,
                        'role' => 2]);
    }
}
