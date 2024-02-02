<?php

namespace App\Http\Controllers;

use App\Models\Bloc_heures;
use App\Models\Contrainte;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class Bloc_HeuresController extends Controller
{
    /**
     * @author Philippe Bertrand
     *
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('bloc_heures.index',[
            'objets' => Bloc_heures::all(),
            'contraintes' => Contrainte::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('bloc_heures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validationBloc_Heures($request);

        $bloc_heures = new Bloc_heures([
            'jour' => $request->jour,
            'heures' => $request->heures
        ]);

        $contrainte = Contrainte::find($request->contrainte);
        $bloc_heures->contraintes()->associate($contrainte);
        $bloc_heures->save();

        return redirect()->route('contraintes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $bloc_heures = Bloc_heures::find($id);
        return view('bloc_heures.show',[
            'bloc_heures' => $bloc_heures
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $bloc_heures = Bloc_heures::find($id);
        return view('bloc_heures.edit',[
           'bloc_heures'=> $bloc_heures
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $bloc_heures = Bloc_heures::find($id);
        $this->validationBloc_Heures($request);
        // Récupérer le nouvel ID de la contrainte
        $nouvelleContrainteId = $request->contrainte;

        // Vérifier si la nouvelle contrainte est différente de l'ancienne contrainte
        if ($nouvelleContrainteId != $bloc_heures->contrainte) {
            // Désassocier l'ancienne contrainte en définissant contrainte_id sur null
            $bloc_heures->update(['contrainte_id' => null]);
        }

        // Associer le bloc d'heures à la nouvelle contrainte en définissant contrainte_id sur la nouvelle valeur
        $bloc_heures->update(['contrainte_id' => $nouvelleContrainteId]);

        $bloc_heures->update([
            'jour' => $request->jour,
            'heures' => $request->heures
        ]);
        return redirect()->route('contraintes.index',$bloc_heures->id)->with('message','Le bloc d\'heures a été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $bloc_heures = Bloc_heures::find($id);
        $bloc_heures->delete();

        return redirect()->route('bloc_heures.index')->with('message', 'Le bloc d\'heures a été supprimé avec succès');
    }
    public function validationBloc_Heures(Request $request): array{
        return $request->validate([
            'jour' => 'required|integer|between:1,5',
            'heures' => 'required|string|size:20|regex:/^[01]+$/',
        ]);
    }

}
