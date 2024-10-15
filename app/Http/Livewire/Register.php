<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    
    public $DocId;
    public $name;
    public $lastname;
    public $email;
    public $password;
    public $password_confirmation;
    
    protected $rules = [
        'DocId' => 'required|numeric|max:9999999999|min:11111111|unique:users,DocId',
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
    ];
    
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function createUser()
    {
        
        $this->validate();
        
        $user = User::create([
            'DocId' => $this->DocId,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Autenticar al usuario recién creado
        Auth::login($user);

        // Redirigir al usuario a la ruta 'home'
        return redirect()->route('home');
    }


    public function render()
    {
        return view('Livewire.register');
    }
}
