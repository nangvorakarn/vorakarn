<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];


    public function getImageUrl(){
        if($this->image_url==null || $this->image_url==""){
            return "/assets/img/box.png";
        }else{
            return $this->image_url;
        }

    }

    public function productType(){

       return $this->belongsTo(ProductType::class, 'product_type_id');

    }

}
