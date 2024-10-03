<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['token', 'branch', 'name', 'digits', 'expiry_date', 'user_DocId'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
