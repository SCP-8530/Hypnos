<?php

namespace App\Http\Controllers;

use App\Models\Cheminements;
use App\Models\Cours;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CoursController extends Controller
{
    /**
     * @author Philippe Bertrand
     *
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('cours.index',[
            'objets' => Cours::all()->sortBy('id')->ToQuery()->paginate(12),
            'cheminements' => Cheminements::all()->sortBy('id')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('cours.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validationCours($request);

        $cours = Cours::create([
           'code' => $request->code,
           'nom' => $request->nom,
           'ponderation' => $request->ponderation,
           'bloc' => $request->bloc
        ]);
        if ($request->cheminement != null) {
            $cours->cheminements()->attach($request->cheminement);
        }
        return redirect()->route('cours.index')->with('message', 'Le cours a été ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cours $cour): View
    {
        return view('cours.show',[
           'cours' => $cour
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cours $cour): View
    {
        return view('cours.edit',[
            'cours' => $cour
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validationCours($request);

        $cours = Cours::findOrFail($id);

        $cours->update([
            'code' => $request->code,
            'nom' => $request->nom,
            'ponderation' => $request->ponderation,
            'bloc' => $request->bloc
        ]);

        if ($request->cheminement != null) {
            $cours->cheminements()->sync($request->cheminement);
        } else {
            $cours->cheminements()->detach();
        }

        return redirect()->route('cours.index')->with('message', 'Le cours a été modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cours $cour): RedirectResponse
    {
        $cour->delete();

        return redirect()->route('cours.index')->with('message', 'Le cours a été supprimé avec succès !');
    }

    public function validationCours(Request $request): array{
        return $request->validate([
            'code' => 'required|string|regex:/^[a-zA-Z0-9]{3}-[a-zA-Z0-9]{3}-[a-zA-Z0-9]{2}$/',
            'nom' => 'required|string|min:10|max:70',
            'ponderation' => 'required|string|regex:/^\d{1,2}-\d{1,2}-\d{1,2}$/',
            'bloc' => 'required|string|regex:/^\d{1,2}-\d{1,2}$/',
            'cheminement' => ['required']
        ]);
    }
}
