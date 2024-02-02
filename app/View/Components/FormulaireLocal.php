<?php

namespace App\View\Components;

use App\Models\Local;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormulaireLocal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $texteBouton = "Enregistrer", public ?Local $local = null)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('local.formulaire');
    }
}
