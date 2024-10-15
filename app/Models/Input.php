<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Input extends Model
{
    use HasFactory;

    protected $fillable = ['user_DocId'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_DocId', 'DocId');
    }

    public function productsinput(): HasMany
    {
        return $this->hasMany(Productsinput::class); // Relación con el modelo 'Output'
    }
}
