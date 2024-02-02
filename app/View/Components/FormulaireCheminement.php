<?php

namespace App\View\Components;

use App\Models\Cheminements;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormulaireCheminement extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $texteBouton = "Enregistrer", public ?Cheminements $cheminement = null)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('cheminements.formulaire');
    }
}
