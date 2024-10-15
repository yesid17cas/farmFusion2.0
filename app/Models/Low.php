<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Low extends Model
{
    use HasFactory;

    protected $fillable = ['reason', 'user_DocId'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_DocId', 'DocId');
    }

    public function productslow(): HasMany
    {
        return $this->hasMany(Productslow::class);
    }
}
