<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Mail\CustomResetPasswordMail;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'DocId';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'DocId',
        'name',
        'lastname',
        'image',
        'address',
        'email',
        'password',
        'stripe_customer_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class); // Relación con el modelo 'Card'
    }

    public function sendPasswordResetNotification($token)
    {
        // Aquí enviamos el token y el usuario (this) al Mailable personalizado
        Mail::to($this->email)->send(new CustomResetPasswordMail($token, $this));
    }
}