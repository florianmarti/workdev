<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{
    public $salario = "";
public $categoria = "";

    protected $listeners = ['eliminarVacante'];

    public function eliminarVacante(Vacante $vacante)
    {


        // $vacante = Vacante::find($vacante);
        $vacante->delete();
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(1);
        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
