<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class CustomResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;  // El token que se enviará en el correo
    public $user;   // El usuario asociado a la solicitud

    public function __construct($token, User $user)
    {
        $this->token = $token;
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.custom-reset-password')
                    ->subject('Restablecimiento de Contraseña')
                    ->with([
                        'resetUrl' => url(route('password.reset', [
                            'token' => $this->token, 
                            'email' => $this->user->email  // Usa la propiedad $user para obtener el correo
                        ], false)),
                    ]);
    }
}
