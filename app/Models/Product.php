<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    // Especifica los campos que se pueden llenar masivamente
    protected $fillable = ['name', 'descrition', 'price', 'exits'];
}
