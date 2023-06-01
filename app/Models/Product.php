<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','sale_price','status','size','weight','category_id','image','content'];
    protected $table = 'products';

    public function cat()
    {
        return $this->hasOne(Category::class, 'id','category_id');
    }
   

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attris');
    }

    public function product_attris()
    {
        return $this->belongsToMany(Attribute::class, 'product_attris', 'id_product', 'id_attr');
    }
   
}