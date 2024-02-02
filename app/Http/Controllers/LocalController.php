<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class LocalController extends Controller
{
    /**
     * @author Philippe Bertrand
     * @author Guillaume Paoli
     *
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->authorizeResource(Local::class,"local");
    }

    public function index(): View
    {
        return view('local.index',[
           'objets' => Local::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('local.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @author Guillaume Paoli
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validationLocal($request);
        //create créer les données à partir de la request
        $local = Local::create([
            'no_local' => $request->no_local,
            'capacite' => $request->capacite,
        ]);
        if (isset($request->proprioHoraire)){
            $local->modif_proprio($request->proprioHoraire);
        }
        //retourne à la liste des données
        return redirect()->route('local.index')->with('message',"Le local $local->no_local a été ajouté avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @author Philippe Bertrand
     * @author Guillaume Paoli
     */
    public function show(Local $local): View
    {
        // Reste du code pour afficher les détails du local

        return view('local.show', ['local'=>$local]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Local $local): View
    {
        return view('local.edit',[
           'local' => $local
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Local $local): RedirectResponse
    {
        $this->validationLocal($request);
        $local->update([
           'no_local' => $request->no_local,
           'capacite' => $request->capacite,
        ]);
        if (isset($request->proprio) && $request->proprio !== $local->proprio?->id)
            $local->modif_proprio($request->proprio);
        else if(!$request->proprio){
            $local->retirerHoraire();
        }
        return redirect()->route('local.show', $local->id)->with('message',"Le local $local->no_local a été modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Local $local): RedirectResponse
    {
        $local->delete();
        return redirect()->route('local.index')->with('message',"Le local $local->no_local a été supprimé avec succès");
    }
    public function validationLocal(Request $request): array{
        return $request->validate([
           'no_local'=>'required|string|min:4|max:6',
           'capacite'=>'required|integer|between:1,35',
           'horaire_id'=>'nullable|exists:horaire,id'
        ]);
    }
}
