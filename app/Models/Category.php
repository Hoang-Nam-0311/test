<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','status'];
    protected $table = 'categories';

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id','id');
    }

    public function cate()
    {
        return $this->hasMany(Category::class, 'category_id', 'id')->where('status', '0');
    }

    public function scopeSearch($query, $limit = 5)
    {
        if (request()->keyword) {
            $query = $query->where('name','like','%'.request()->keyword.'%')
                    ->orderBy('id','DESC');
        }

        return $query->paginate($limit);
    }

    public function scopeIsActive($query)
    {
        return $this->where('status',1)->orderBy('id','DESC');
    }

    public function product(){
        return $this->hasMany('App\Models\Product');
    }
}