<?php

namespace App\Http\Controllers;


use App\Models\GroupeCours;
use App\Models\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * Controller qui va gerer la groupe_cours des groupe cours et des horaires
 *
 * @author Guillaume Paoli
*/
class GroupeCoursController extends Controller
{
    public function __construct(){
        $this->authorizeResource(GroupeCours::class, 'groupe_cour');
    }

    public function index(): View
    {
        return view('groupe_cours.index',
            [
                "objets" => GroupeCours::all(),
                "sessions" => Session::all()->sortBy('id', descending: true)
            ]);
    }

    public function create(): View
    {
        return view('groupe_cours.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->GcValidation($request);
        $gc = GroupeCours::create([
            'no_groupe' => $request->no_groupe,
            'nb_etudiants' => $request->nb_etudiants,
            'campus_id' => $request->campus_id,
            'session_id' => $request->session_id,
            'cours_id' => $request->cours_id
        ]);
        if ($request->enseignant != null){
            foreach ($request->enseignant as $prof)
            {
                $gc->AjoutEnseignant($prof,$gc->id);
            }
        }
        return redirect()->route('groupe_cours.index')->with('message', 'Groupe Cours ajouter avec succes');
    }

    public function show(GroupeCours $groupe_cour): View
    {
        return view('groupe_cours.show', [
            "groupe_cour" => $groupe_cour
        ]);
    }

    public function edit(GroupeCours $groupe_cour): View
    {
        return view('groupe_cours.edit', [
            "groupe_cour" => $groupe_cour
        ]);
    }

    public function update(Request $request, GroupeCours $groupeCours): RedirectResponse
    {
        $this->validationEnseignant($groupeCours);
        $groupeCours->update([
            'no_groupe' => $request->no_groupe,
            'nb_etudiants' => $request->nb_etudiants,
            'campus_id' => $request->campus_id,
            'session_id' => $request->session_id,
            'cours_id' => $request->cours_id
        ]);
        $ls_GC_E = DB::table("enseignant_groupe_cours")
            ->where('groupe_cours_id', '=', $groupeCours->id)
            ->delete();
        if ($request->enseignant != null){
            foreach ($request->enseignant as $prof)
            {
                $groupeCours->AjoutEnseignant($prof,$groupeCours->id);
            }
        }
        return redirect()->route('groupe_cours.show', $groupeCours->id)->with('message', 'Le groupe cours a été modifié avec succès.');
    }

    public function destroy(GroupeCours $groupeCour): RedirectResponse
    {
        $groupeCour->delete();
        return redirect()->route('groupe_cours.index')->with('message','Le groupe cours a été supprimé avec succès.');
    }

    public function GcValidation(Request $request): array {
        return $request->validate([
            'no_groupe' => ['required','integer','min:1'],
            'nb_etudiants' => ['required','integer','min:1','max:45'],
            'campus_id' => ['required','integer'],
            'session_id' => ['required','integer'],
            'cours_id' => ['required','integer'],
            'enseignant' =>['required']
        ]);
    }
}
