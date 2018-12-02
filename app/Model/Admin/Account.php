<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
    protected $table = "account";
    protected $primarykey = "account_id";
    public $timestamps = false;

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
    public function getAccountById($idAcc)
    {
        return $this->select('avatar', 'password')->where('account_id', $idAcc)->first();
    }
    // lấy thông tin tài khoản
    public function accountInfo($accId)
    {
        if(session()->has('admin')){
             $id = session()->get('admin')[0]->account_id;
        }
        return DB::table('account')->join('customer', 'account.account_id', '=', 'customer.account_id')->select('account.username', 'account.email', 'account.avatar', 'customer.phone', 'customer.birthday', 'customer.address')->where('account.account_id', $accId)->get();
    }
    public function updateInfo($idAcc, $arrAcc)
    {
        return $this->where('account_id', $idAcc)->update($arrAcc);

    }
    public function getAccountByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
    public function managePostInfo($accId)
    {
        if(session()->has('admin')){
             $id = session()->get('admin')[0]->account_id;
        }
        return DB::table('customer')->join('account', 'account.account_id', '=', 'customer.account_id')->join('catalog', 'catalog.catalog_id', '=', 'customer.catalog_id')->select('account.account_id','customer.date','customer.customer_name','customer.address','catalog.catalog_name','customer.status_customer')->where('account.account_id', $accId)->get();
    }
    public function transactionHistory($accId)
    {
        if(session()->has('admin')){
             $id = session()->get('admin')[0]->account_id;
        }
        return DB::table('customer')->join('account', 'account.account_id', '=', 'customer.account_id')->join('orders', 'orders.customer_id', '=', 'customer.customer_id')->select('account.account_id','customer.status_customer','customer.customer_name','orders.order_id','orders.date_create','orders.total','orders.status')->where('account.account_id', $accId)->get();
    }
}
