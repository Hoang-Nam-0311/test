<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttri extends Model
{
    use HasFactory;

    protected $fillable = ['id_product', 'id_attr'];
}