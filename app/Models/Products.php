<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['product_name', 'product_short_desc', 'product_price', 'product_quantity', 'poster_id', 'cover_pic'];
    use HasFactory;
}
