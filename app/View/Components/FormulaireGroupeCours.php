<?php

namespace App\View\Components;

use App\Models\GroupeCours;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * @author Guillaume Paoli
*/
class FormulaireGroupeCours extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $texteBouton = "Enregistrer", public ?GroupeCours $groupeCours = null)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render() : View|Closure|string
    {
        return view('groupe_cours.formulaire');
    }
}
