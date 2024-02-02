<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CampusController extends Controller
{
    /**
     * @author Guillaume Paoli
     *
     *
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('campus.index',[
            'objets'=>Campus::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('campus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //requeste sont les donnees recuperere
        $request->validate([
            'nom' => 'required|string|min:0|max:50',
        ]);
        //create creer les donnees a partir de la request
        Campus::create([
            'nom' => $request->nom
        ]);
        //retourne a la liste des donnees
        return redirect()->route('campus.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Campus $campus): View
    {
        return view('campus.show',[
            'campus'=>$campus
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campus $campus): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campus $campus): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campus $campus): RedirectResponse
    {
        //
    }
}
