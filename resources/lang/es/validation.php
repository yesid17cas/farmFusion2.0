<?php
return [
    'required' => 'El campo :attribute es obligatorio.',
    'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
    'unique' => 'El :attribute ya ha sido registrado.',
    'confirmed' => 'Las contraseñas no coinciden.',
    'digits' => 'El campo :attribute debe tener :digits dígitos.',
    'filled' => 'El campo :attribute es obligatorio.',
    'same' => 'Los campos :attribute y :other deben coincidir.',
    'regex' => 'El campo :attribute debe contener al menos una mayúscula, una minúscula, un número y un carácter especial.',

    'custom' => [
        'email' => [
            'email' => 'El campo correo electrónico debe ser una dirección válida.',
        ],
        'password' => [
            'min' => 'La contraseña debe tener al menos :min caracteres.',
        ],
        'DocId' => [
            'numeric' => 'El documento de identidad debe ser un número.',
            'min' => 'El documento de identidad debe contener al menos 8 digitos.',
            'max' => 'El documento de identidad debe contener menos de 10 digitos.',
        ],
    ],

    'max' => [
        'numeric' => 'El valor de :attribute no puede ser mayor que :max.',
        'string'  => 'El texto :attribute no puede contener más de :max caracteres.',
    ],

    'min' => [
        'numeric' => 'El valor de :attribute debe ser al menos :min.',
        'string'  => 'El texto :attribute debe contener al menos :min caracteres.',
    ],


    'attributes' => [
        'DocId' => 'documento de identidad',
        'name' => 'nombre',
        'lastname' => 'apellido',
        'email' => 'correo electrónico',
        'password' => 'contraseña',
        'password_confirmation' => 'confirmación de contraseña',
    ],
];
