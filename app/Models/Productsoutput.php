<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productsoutput extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'output_id', 'amount', 'price'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function outputs()
    {
        return $this->belongsTo(Output::class);
    }
}
