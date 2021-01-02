<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtb_bills extends Model
{
    use HasFactory;
    protected $table="dtb_bills";
    public $timestamps = false;
    public function dtb_customer(){
    	return $this->belongsTo("App\Models\dtb_customer","id_customer","id");
    }
    public function dtb_billdetail(){
    	return $this->hasMany("App\Models\dtb_billdetail","id_bill","id");
    }
}
