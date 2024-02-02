<?php

namespace App\View\Components;

use App\Models\Bloc_heures;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormulaireBlocHeures extends Component
{
    /**
     * @author Philippe Bertrand
     *
     * Create a new component instance.
     */
    public function __construct(public string $texteBouton = "Enregistrer", public ?Bloc_heures $bloc_heures = null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('bloc_heures.formulaire');
    }
}
