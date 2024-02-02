<?php

namespace App\View\Components;

use App\Models\Enseignant;
use App\Models\Horaires;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormulaireEnseignant extends Component
{
    /**
     * @author Philippe Bertrand
     *
     * Create a new component instance.
     */
    public function __construct(public string $texteBouton = "Enregistrer", public ?Enseignant $enseignant = null)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('enseignants.formulaire',[
            'horaires' => Horaires::all()->sortBy('id')
        ]);
    }
}
