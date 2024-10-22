<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $table = 'products';

    // Especifica los campos que se pueden llenar masivamente
    protected $fillable = ['name', 'descrition', 'price', 'exits', 'user_DocId', 'image', 'unity']; 

    public function productsoutput(): HasMany
    {
        return $this->hasMany(Productsoutput::class); // Relación con el modelo 'Output'
    }

    public function productsoinput(): HasMany
    {
        return $this->hasMany(Productsinput::class, 'products_id'); // Relación con el modelo 'Output'
    }

    public function productslow(): HasMany
    {
        return $this->hasMany(Productslow::class); // Relación con el modelo 'Output'
    }
}

