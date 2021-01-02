<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtb_billdetail extends Model
{
    use HasFactory;
    protected $table="dtb_billdetail";
    public $timestamps = false;
    public function dtb_bills(){
    	return $this->belongsTo("App\Models\dtb_bills","id_bill","id");
    }
    public function dtb_product(){
    	return $this->belongsTo("App\Models\dtb_product","id_product","id");
    }
}
