<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Output extends Model
{
    use HasFactory;

    protected $fillable = ['pay', 'user_DocId'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_DocId', 'DocId');
    }

    public function productsoutput(): HasMany
    {
        return $this->hasMany(Productsoutput::class); // Relación con el modelo 'Output'
    }
}
