<?php

namespace App\View\Components;

use App\Models\Horaires;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableHoraire extends Component
{
    /** @author Guillaume Paoli
     * Create a new component instance.
     */
    public function __construct(public ?Horaires $horaire = null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('horaire.table');
    }
}
