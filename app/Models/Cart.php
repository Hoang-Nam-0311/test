<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    
    use HasFactory;
    protected $fillable = ['quantity', 'total_price', 'cus_id', 'pro_id'];

    public function cart_attr()
    {
        return $this->belongsToMany(Attribute::class, 'cart_attrs', 'cart_id', 'attr_id');
    }

    public function cart()
    {
        return $this->hasOne(Product::class, 'id', 'pro_id');
    }
}
