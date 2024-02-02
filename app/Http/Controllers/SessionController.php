<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SessionController extends Controller
{
    /**
     * @author Philippe Bertrand
     *
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('session.index',[
            'objets' => Session::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('session.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'annee'=>['required','integer','min:2023'],
            'saison'=>['required','regex:/^(Été|Hiver|Automne)$/']
        ]);
        $session = Session::create([
            'annee'=>$request->annee,
            'session'=>$request->saison
        ]);
        return redirect()->route('groupe_cours.index')->with('message', 'La session a bien été ajouter');

    }

    /**
     * Display the specified resource.
     */
    public function show(Session $session): View
    {
        return view('session.show',[
            'session' => $session
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Session $session): Response
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Session $session): RedirectResponse
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session): RedirectResponse
    {
        //
    }
}
