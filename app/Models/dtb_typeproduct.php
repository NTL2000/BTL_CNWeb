<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtb_typeproduct extends Model
{
    use HasFactory;
    protected $table="dtb_typeproduct";
    public $timestamps = false;
    public function dtb_product(){
    	return $this->belongsTo("App\Models\dtb_product","id_type","id");
    }
}
