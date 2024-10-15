<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productsinput extends Model
{
    use HasFactory;

    protected $fillable = ['products_id', 'inputs_id', 'amount'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function input()
    {
        return $this->belongsTo(Input::class);
    }
}
