<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtb_product extends Model
{
    use HasFactory;
    protected $table="dtb_product";
    public $timestamps = false;
    public function dtb_billdetail(){
    	return $this->hasMany("App\Models\dtb_billdetail","id_product","id");
    }
    public function dtb_typeproduct(){
    	return $this->belongsTo("App\Models\dtb_typeproduct","id_type","id");
    }
    public function dtb_config(){
    	return $this->belongsTo("App\Models\dtb_config","id_configuration","id");
    }
}
