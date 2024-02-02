<?php

namespace App\Http\Controllers;

use App\Models\Cheminements;
use App\Models\Enseignant;
use App\Models\Horaires;
use App\Models\Local;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;


/**
 * @author Guillaume Paoli
 */
class HoraireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->authorizeResource(Horaires::class, 'horaire');
    }

    public function index(): View
    {
        return view('horaire.index',[
            'objets'=>Horaires::all()->sortBy('id')->ToQuery()->paginate(12),
            'l'=>Local::all(),
            'e'=>Enseignant::all(),
            'c'=>Cheminements::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        if (Gate::none(['admin','gestionnaire'])) {
            abort(403);
        }
        return view('horaire.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Gate::any(['admin','gestionnaire']);
        //nouvelle validation
        $this->validateHoraire($request);

        //create creer les donnees a partir de la request
        Horaires::create([
            'lundi' => $request->lundi,
            'mardi' => $request->mardi,
            'mercredi' => $request->mercredi,
            'jeudi' => $request->jeudi,
            'vendredi' => $request->vendredi,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        //retourne a la liste des donnees
        return redirect()->route('horaire.index')->with('message', "L'horaire a ete ajouter avec succes");

    }

    /**
     * Display the specified resource.
     */
    public function show(Horaires $horaire): View
    {
        if (Gate::none(['admin','gestionnaire','prof'])) {
            abort(403);
        }
        return view('horaire.show',[
            'horaire'=>$horaire
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horaires $horaire): View
    {
        if (Gate::none(['admin','gestionnaire'])) {
            abort(403);
        }
        return view('horaire.edit',[
            'horaire' => $horaire
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horaires $horaire): RedirectResponse
    {
        Gate::any(['admin','gestionnaire']);
        $this->validateHoraire($request);
        $horaire->update([
            'lundi' => $request->lundi,
            'mardi' => $request->mardi,
            'mercredi' => $request->mercredi,
            'jeudi' => $request->jeudi,
            'vendredi' => $request->vendredi
        ]);
        return redirect()->route(
            'horaire.show', $horaire->id
        )->with('message', "L'horaire a ete modifier avec succes");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horaires $horaire): RedirectResponse
    {
        Gate::any(['admin','gestionnaire']);
        $horaire->delete();
        return redirect()->route('horaire.index')->with(
            'message',"L'horaire a ete supprimer avec succes"
        );
    }

    public function validateHoraire(Request $request): array{
        return $request->validate([
            'lundi' => 'required|regex:/^[01]{20}$/',
            'mardi' => 'required|regex:/^[01]{20}$/',
            'mercredi' => 'required|regex:/^[01]{20}$/',
            'jeudi' => 'required|regex:/^[01]{20}$/',
            'vendredi' => 'required|regex:/^[01]{20}$/',
        ]);
    }
}
