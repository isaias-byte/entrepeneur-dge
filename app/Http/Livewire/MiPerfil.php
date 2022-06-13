<?php

namespace App\Http\Livewire;

use App\Models\Estudiante;
use Livewire\Component;

class MiPerfil extends Component
{

    public $estudiante;

    public function mount()
    {
        $this->estudiante = Estudiante::firstOrNew();
    }

    public function render()
    {
        return view('livewire.mi-perfil');
    }
}
