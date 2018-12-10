<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cat extends Model
{
    protected $table="catalog";
    protected $primaryKey = "catalog_id";
    public $timestamps = false;

    public function getAll()
    {
    	return $this->all();
    }
    public function addItem($arItem)
    {
    	 return $this->insert([
            'catalog_name' => $arItem['catalog_name'],
            'status' => "1"
        ]);
    }
    public function getItem($cid)
    {
        return $this->FindOrFail($cid);
    }
    public function editItem($cid, $arItem)
    {
        return $this->where('catalog_id', $cid)->update($arItem);
    }
    public function updateStatus($id, $presentStatus){
        if($presentStatus == "1"){
            return DB::table('catalog')->where('catalog_id', $id)->update(['status' => 0]);
        }
        else{
            return DB::table('catalog')->where('catalog_id', $id)->update(['status' => 1]);
        }
    }
    public function getCatOffset0()
    {
        return $this->offset(0)->limit(5)->get();
    }
    public function getCatOffset2()
    {
        $count = DB::table('catalog')->count();
        return $this->offset(5)->limit($count-2)->get();

    }
    public function findItem($id)
    {
        return $this->find($id);
    }
}
