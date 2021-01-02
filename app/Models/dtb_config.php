<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtb_config extends Model
{
    use HasFactory;
    protected $table="dtb_config";
    public $timestamps = false;
    public function dtb_product(){
    	return $this->hasMany("App\Models\dtb_product","id_configuration","id");
    }
}
