<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Horaires;

class EnseignantController extends Controller
{
    /**
     * @author Philippe Bertrand
     *
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->authorizeResource(Enseignant::class, 'enseignant');
    }

    public function index(): View
    {
        return view('enseignants.index',[
           'objets' => Enseignant::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
       /* if (Gate::none(['admin','gestionnaire'])) {
            abort(403);
        } */
        return view("enseignants.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @author Guillaume Paoli
     */
    public function store(Request $request): RedirectResponse
    {
       // Gate::any(['admin','gestionnaire']);
        $this->validationEnseignant($request);

        $enseignant = Enseignant::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'bureau' => $request->bureau,
            'poste' => $request->poste,
            'horaire_id' => Horaires::factory()->create([
                'lundi' => '00000000000000000000',
                'mardi' => '00000000000000000000',
                'mercredi' => '00000011111100000000',
                'jeudi' => '00000000000000000000',
                'vendredi' => '00000000000000000000',
            ])->id,
            'user_id' => $request->user_id
        ]);
        if (isset($request->proprio)){
            $enseignant->modif_proprio($request->proprio);
        }
        return redirect()->route('enseignants.index')->with('message', 'L\'enseignant a été créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enseignant $enseignant): View
    {
        /*if (Gate::none(['admin','gestionnaire','prof'])) {
            abort(403);
        }*/

        return view('enseignants.show',[
           'enseignant'=>$enseignant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enseignant $enseignant): View
    {
       /* if (Gate::none(['admin','gestionnaire'])) {
            abort(403);
        }*/
        return view('enseignants.edit',[
           'enseignant' => $enseignant
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @author Guillaume Paoli
     */
    public function update(Request $request, Enseignant $enseignant): RedirectResponse
    {
       // Gate::any(['admin','gestionnaire']);
        $this->validationEnseignant($request);
        $enseignant->update([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'bureau' => $request->bureau,
            'poste' => $request->poste,
            'user_id' => $request->user_id
        ]);
        /*if (isset($request->proprio) && $request->proprio !== $enseignant->proprio?->id)
            $enseignant->modif_proprio($request->proprio);
        else if(!$request->proprio){
            $enseignant->retirerHoraire();
        }*/
        return redirect()->route('enseignants.show', $enseignant->id)->with('message', 'L\'enseignant a été modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enseignant $enseignant): RedirectResponse
    {
       // Gate::any(['admin','gestionnaire']);
        $enseignant->delete();

        return redirect()->route('enseignants.index')->with('message','L\'enseignant a été supprimé avec succès.');
    }

    public function validationEnseignant(Request $request): array{
        return $request->validate([
            'prenom' => 'required|string|min:4|max:30',
            'nom' => 'required|string|min:4|max:30',
            'bureau' => 'nullable|string|min:4|max:15',
            'poste' => [
                'nullable',
                'integer',
                'regex:/^([0-9]{4}|0)$/'
                ],
            'user_id'=>'nullable'
        ]);
    }
}
