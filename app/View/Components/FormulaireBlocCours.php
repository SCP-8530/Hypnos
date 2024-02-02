<?php

namespace App\View\Components;

use App\Models\Bloc_cours;
use App\Models\Bloc_heures;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormulaireBlocCours extends Component
{
    /**
     * @author Philippe Bertrand
     *
     * Create a new component instance.
     */
    public function __construct(public string $texteBouton = "", public ?Bloc_cours $bloc_cours = null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('bloc_cours.formulaire');
    }
}
