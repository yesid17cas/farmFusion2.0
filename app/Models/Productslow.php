<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productslow extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'low_id', 'amount'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function outputs()
    {
        return $this->belongsTo(Low::class);
    }
}
