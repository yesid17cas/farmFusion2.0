<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Informacion extends Component
{

    use WithFileUploads;

    public $name;
    public $lastname;
    public $email;
    public $image; // Si quieres manejar la imagen en Livewire
    public $datos;
    public $formVisible = false;
    public $lectura = true;

    public function toggleForm()
    {
        $this->formVisible = !$this->formVisible;
        $this->lectura = !$this->lectura;
    }


    protected $rules = [
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
    ];

    public function mount()
    {
        $this->datos = User::where('DocID', auth()->id())->first();
        $this->name = $this->datos->name;
        $this->lastname = $this->datos->lastname;
        $this->email = $this->datos->email;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function editar()
    {
        $this->validate();

        $user = User::find($this->datos->DocId);

        if ($user) {
            $user->name = $this->name;
            $user->lastname = $this->lastname;
            $user->email = $this->email;

            // Manejo de la imagen
            if ($this->image) {
                // Guardar la imagen
                $imageName = time() . '.' . $this->image->extension();
                $this->image->storeAs('images', $imageName, 'public'); // Guardar en el disco público
                $user->image = $imageName; // Actualizar el campo de la imagen en la base de datos
            }

            $user->save();

            session()->flash('message', 'Datos actualizados correctamente.');
            $this->formVisible = !$this->formVisible;
            $this->lectura = !$this->lectura;
        }
    }

    public function render()
    {
        return view('livewire.informacion');
    }

    public function getImagePreviewProperty()
    {
        return $this->image ? $this->image->temporaryUrl() : null;
    }
}
