<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function productImages()
    {
        return $this->hasMany(ProductImages::class, "product_id", "id");
    }

    public function comments()
    {
        return $this->hasMany(ProductComments::class, "product_id", "id");
    }
}
