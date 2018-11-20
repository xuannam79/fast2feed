<?php

namespace App\Model\Customer;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $table="catalog";
    protected $primaryKey = "catalog_id";
    public $timestamps = false;

    public function getAll()
    {
    	return $this->all();
    }
}
