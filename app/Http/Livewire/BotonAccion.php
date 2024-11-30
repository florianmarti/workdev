<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BotonAccion extends Component
{
    public $href;
    public $color;
    public $hoverColor;
    public $text;

    public $vacante;

    public function mount($href = '#', $color = 'bg-slate-800', $hoverColor = 'hover:bg-slate-700', $text = 'Botón', $vacante = null)
    {
        $this->href = $href;
        $this->color = $color;
        $this->hoverColor = $hoverColor;
        $this->text = $text;
        $this->vacante = $vacante;
    }



    public function render()
    {
        return view('livewire.boton-accion');
    }
}
