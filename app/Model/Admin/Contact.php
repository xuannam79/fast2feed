<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contact";
    protected $primarykey = "contact_id";
    public $timestamp = false;

    public function getAll()
    {
    	return $this->all();
    }
}
