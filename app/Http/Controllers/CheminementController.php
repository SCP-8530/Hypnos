<?php

namespace App\Http\Controllers;

use App\Models\Cheminements;
use App\Models\Contrainte;
use App\Models\Horaires;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CheminementController extends Controller
{
    /**
     * @author Philippe Bertrand
     *
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->authorizeResource(Cheminements::class,"cheminement");
    }
    public function index(): View
    {
        return view('cheminements.index', [
            'cheminements' => Cheminements::all(),
            'contraintes' => Contrainte::all()
        ]);
    }

    public function create(): View
    {
        return view('cheminements.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validationCheminements($request);
        $cheminement = Cheminements::create([
            'nom' => $request->nom,
            'no_session' => $request->no_session,
            'horaire_id' => Horaires::factory()->create([
                'lundi' => '00000000000000000000',
                'mardi' => '00000000000000000000',
                'mercredi' => '00000011111100000000',
                'jeudi' => '00000000000000000000',
                'vendredi' => '00000000000000000000',
            ])->id,
        ]);
        if ($request->cours != null) {
            $cheminement->cours()->attach($request->cours);
        }

        return redirect()->route('cheminements.index')
            ->with('message', 'Le cheminement a été créé avec succès.');
    }

    public function show(Cheminements $cheminement): View
    {
        return view('cheminements.show', [
            'cheminement' => $cheminement,
        ]);
    }

    public function edit(Cheminements $cheminement): View
    {
        return view('cheminements.edit', [
            'cheminement' => $cheminement,
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validationCheminements($request);

        $cheminement = Cheminements::findOrFail($id);

        $cheminement->update([
            'nom' => $request->nom,
            'no_session' => $request->no_session,
        ]);

        if ($request->cours != null) {
            $cheminement->cours()->sync($request->cours);
        } else {
            $cheminement->cours()->detach();
        }

        return redirect()->route('cheminements.show', $cheminement->id)
            ->with('message', 'Le cheminement a été modifié avec succès.');
    }

    public function destroy(Cheminements $cheminement): RedirectResponse
    {
        $cheminement->delete();

        return redirect()->route('cheminements.index')
            ->with('message', 'Le cheminement a été supprimé avec succès.');
    }

    public function validationCheminements(Request $request): array{
        return $request->validate([
            'nom' => 'required|string|min:4|max:50',
            'no_session' => 'required|integer',
            'cours'=> 'required'
        ]);
    }
}
