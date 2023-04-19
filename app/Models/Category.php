<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // const CREATED_AT = 'ngay_tao';
    protected $fillable = ['name','status'];
    protected $table = 'category';

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id','id');
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
}