<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Busqueda extends Component
{

    public $search;

    public function render()
    {
        $articulos = $this->search
            ? Product::where('name', 'like', '%'.$this->search.'%')->get()
            : [];

        return view('livewire.busqueda', [
            'articulos' => $articulos,
        ]);
    }
}
