<?php

namespace App\View\Components;

use App\Models\Cours;
use App\Models\Enseignant;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormulaireCours extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $texteBouton = "Enregistrer", public ?Cours $cours = null)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('cours.formulaire');
    }
}
