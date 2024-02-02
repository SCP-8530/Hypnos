<?php

namespace App\Http\Controllers;

use App\Models\Bloc_heures;
use App\Models\Contrainte;
use App\Models\Enseignant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContrainteController extends Controller
{
    /** @author Philippe Bertrand
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('contraintes.index',[
            'contraintes' => Contrainte::all(),
            'bloc_heures' => Bloc_heures::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('contraintes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validationContrainte($request);
        $contrainte = Contrainte::create([
           'nom' => $request->nom,
            'stricte'=> $request->stricte
        ]);
        $enseignant = Enseignant::find($request->enseignant);
        $contrainte->enseignant()->associate($enseignant);
        $contrainte->save();
        return redirect()->route('contraintes.index')->with('message', 'La contrainte a été crée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contrainte = Contrainte::Find($id);

        return view('contraintes.show', compact('contrainte'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrainte $contrainte):View
    {
        return view('contraintes.edit',[
            'contrainte' => $contrainte
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contrainte $contrainte): RedirectResponse
    {
        $this->validationContrainte($request);

        // Récupérer le nouvel enseignant
        $nouvelEnseignantId = $request->enseignant;

        // Vérifier si l'enseignant sélectionné est différent de l'enseignant actuellement associé
        if ($nouvelEnseignantId != $contrainte->enseignant) {
            // Désassocier l'ancien enseignant en définissant enseignant_id sur null
            $contrainte->update(['enseignant_id' => null]);

            // Associer le nouvel enseignant en définissant enseignant_id sur la nouvelle valeur
            $contrainte->update(['enseignant_id' => $nouvelEnseignantId]);
        }

        // Mettre à jour les autres attributs de la contrainte
        $contrainte->update([
            'nom' => $request->nom,
            'stricte' => $request->stricte
        ]);

        return redirect()->route('contraintes.show', $contrainte->id)->with('message','La contraite a été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrainte $contrainte)
    {
        $contrainte->delete();

        return redirect()->route('contraintes.index')->with('message', 'La contrainte a été supprimé avec succès.');
    }
    public function validationContrainte(Request $request): array{
        return $request->validate([
            'nom' => 'required|string|min:2|max:200',
            'stricte' => 'required|integer|in:0,1'
        ]);
    }
}
