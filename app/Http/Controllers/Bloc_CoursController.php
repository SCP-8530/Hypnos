<?php

namespace App\Http\Controllers;

use App\Models\Bloc_cours;
use App\Models\GroupeCours;
use App\Models\Local;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class Bloc_CoursController extends Controller
{
    /**
     * @author Philippe Bertrand
     *
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('bloc_cours.index',[
            'objets' => Bloc_cours::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @author Guillaume
     */
    public function create(int $heures=0, int $id=0): View
    {
        if ($heures!= 0 and $id != 0)
            return view('bloc_cours.create', [
                "heures_gc" => $heures,
                "id_gc" => $id
            ]);
        else
            return view('bloc_cours.create');
    }

    /**
     * Store a newly created resource in storage.
     * @author Guillaume
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validationBloc_Cours($request);
        if($this->horaireValide($request->jour,$request->heures,$request->local_id,$request->groupe_cours_id)==false){
            return  redirect()->route('bloc_cours.create')->with('message', 'Il y a un comflit avec la plage horaire choisi');
        }
        $bloc_Cours = Bloc_cours::create([
            'jour' => $request->jour,
            'heures' => $request->heures,
            'local_id' => $request->local_id,
            'groupe_cours_id' => $request->groupe_cours_id
        ]);
        $this->UpdateHoraireEnseignant($bloc_Cours->jour,$bloc_Cours->heure,$bloc_Cours->groupe_cours_id,false);
        $this->UpdateHoraireLocal($bloc_Cours->jour,$bloc_Cours->heure,$bloc_Cours->local->id,false);
        return redirect()->route('groupe_cours.show', $request->groupe_cours_id)->with('message', 'Le bloc de cours a été ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $bloc_cours = Bloc_cours::find($id);
        return view('bloc_cours.show',[
            'bloc_cours'=>$bloc_cours
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bloc_cours $bloc_Cours): View
    {
        return view('bloc_cours.edit',[
           'bloc_cours' => $bloc_Cours
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $bloc_Cours = Bloc_cours::find($id);
        $this->validationBloc_Cours($request);
        if($this->horaireValide($request->jour,$request->heures,$request->local_id,$request->groupe_cours_id)==false){
            return  redirect()->route('bloc_cours.edit')->with('message', 'Il y a un comflit avec la plage horaire choisi');
        }
        $this->UpdateHoraireEnseignant($bloc_Cours->jour,$bloc_Cours->heure,$bloc_Cours->groupe_cours_id,true);
        $this->UpdateHoraireLocal($bloc_Cours->jour,$bloc_Cours->heure,$bloc_Cours->local->id,true);
        $bloc_Cours->update([
            'jour' => $request->jour,
            'heures' => $request->heures,
            'local_id' => $request->local_id,
            'groupe_cours_id' => $request->groupe_cours_id
        ]);
        $this->UpdateHoraireEnseignant($bloc_Cours->jour,$bloc_Cours->heure,$bloc_Cours->groupe_cours_id,false);
        $this->UpdateHoraireLocal($bloc_Cours->jour,$bloc_Cours->heure,$bloc_Cours->local->id,false);
        return redirect()->route('bloc_cours.show',$bloc_Cours->id)->with('message','Le bloc de cours a été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $bloc_Cours =Bloc_cours::find($id);
        $this->UpdateHoraireEnseignant($bloc_Cours->jour,$bloc_Cours->heure,$bloc_Cours->groupe_cours_id,true);
        $this->UpdateHoraireLocal($bloc_Cours->jour,$bloc_Cours->heure,$bloc_Cours->local->id,true);
        $bloc_Cours->delete();

        return redirect()->route('bloc_cours.index')->with('message', 'Le bloc de cours a été supprimé avec succès');
    }

    /**
     * Validation de bloc_cours
     * @author Guillaume
     */
    public function validationBloc_Cours(Request $request): array{
        $ls_id_local = DB::table("locals")->pluck("id")->toArray();
        $ls_id_gc = DB::table("groupe_cours")->pluck("id")->toArray();

        return $request->validate([
            'jour' => 'required|integer|between:1,5',
            'heures' => 'required|string|size:20|regex:/^[01]+$/',
            'local_id' => [
                "required",
                Rule::in($ls_id_local)
            ],
            'groupe_cours_id' => [
                "required",
                Rule::in($ls_id_gc)
            ]
        ]);
    }

    /**
     * @author Guillaume
     * fonction qui faite en sorte de mettre a jour l'horaire du local
    */
    public function UpdateHoraireLocal(int $int_jour, string $heure, int $local_id, bool $sup){
        //initialisation de local
        $local = Local::find($local_id);
        $horaire = $local->proprio;
        $heure_liste = str_split($heure);
        $chars = [];

        //modification de l'horaire selon le jour
        if ($int_jour == 1) { $chars = str_split($horaire->lundi); }
        if ($int_jour == 2) { $chars = str_split($horaire->mardi); }
        if ($int_jour == 3) { $chars = str_split($horaire->mercredi); }
        if ($int_jour == 4) { $chars = str_split($horaire->jeudi); }
        if ($int_jour == 5) { $chars = str_split($horaire->vendredi); }

        //preparation du changement
        for($char = 0; $char < 20; $char++) {
            if($sup == false and $heure_liste[$char] == "1") {$chars[$char] == "1";}
            if($sup == true and $heure_liste[$char] == "1") {$chars[$char] == "0";}
        }

        //application des changements
        if ($int_jour == 1) { $horaire->lundi = implode($chars); }
        if ($int_jour == 2) { $horaire->mardi = implode($chars); }
        if ($int_jour == 3) { $horaire->mercredi = implode($chars); }
        if ($int_jour == 4) { $horaire->jeudi = implode($chars); }
        if ($int_jour == 5) { $horaire->vendredi = implode($chars); }
    }

    /**
     * @author Guillaume
     * fonction qui faite en sorte de mettre a jour l'horaire des enseignants
     */
    public function UpdateHoraireEnseignant(int $int_jour, string $heure, int $gc_id, bool $sup){
        //initialisation de local
        $groupe_cours = GroupeCours::find($gc_id);
        $enseigants_lst = $groupe_cours->proprioEnseignant;
        if ($enseigants_lst != null) foreach ($enseigants_lst as $enseignant)
        {
            $horaire = $enseignant->proprio;
            $heure_liste = str_split($heure);
            $chars = [];

            //modification de l'horaire selon le jour
            if ($int_jour == 1) { $chars = str_split($horaire->lundi); }
            if ($int_jour == 2) { $chars = str_split($horaire->mardi); }
            if ($int_jour == 3) { $chars = str_split($horaire->mercredi); }
            if ($int_jour == 4) { $chars = str_split($horaire->jeudi); }
            if ($int_jour == 5) { $chars = str_split($horaire->vendredi); }

            //preparation du changement
            for($char = 0; $char < 20; $char++) {
                if($sup == false and $heure_liste[$char] == "1") {$chars[$char] == "1";}
                if($sup == true and $heure_liste[$char] == "1") {$chars[$char] == "0";}
            }

            //application des changements
            if ($int_jour == 1) { $horaire->lundi = implode($chars); }
            if ($int_jour == 2) { $horaire->mardi = implode($chars); }
            if ($int_jour == 3) { $horaire->mercredi = implode($chars); }
            if ($int_jour == 4) { $horaire->jeudi = implode($chars); }
            if ($int_jour == 5) { $horaire->vendredi = implode($chars); }
        }
    }

    /**
     * @author Guillaume
     * La fonction s'assure que le bloc cours peut etre placer au bonne endroit
    */
    public function horaireValide(int $int_jour, string $heure, int $id_local, int $gc_id): Bool {
        //initialisation des donnees
        $local = Local::find($id_local);
        $groupe_cours = GroupeCours::find($gc_id);
        $enseigants_lst = $groupe_cours->proprioEnseignant;
        $heure_array = str_split($heure);

        //verification conflit avec les enseignants
        if ($enseigants_lst != null) foreach ($enseigants_lst as $enseignant)
        {
            $horaire = $enseignant->proprio;
            $chars = [];

            //modification de l'horaire selon le jour
            if ($int_jour == 1) { $chars = str_split($horaire->lundi); }
            if ($int_jour == 2) { $chars = str_split($horaire->mardi); }
            if ($int_jour == 3) { $chars = str_split($horaire->mercredi); }
            if ($int_jour == 4) { $chars = str_split($horaire->jeudi); }
            if ($int_jour == 5) { $chars = str_split($horaire->vendredi); }

            //boucle de verification
            for($char = 0; $char < 20; $char++) {
                if ($heure_array[$char] == "1")
                {
                    if ($heure_array[$char] == $chars[$char]) return false;
                }
            }
        }

        //verification avec l'horaire du local
        $horaire = $local->proprio;
        $chars = [];

        if ($int_jour == 1) { $chars = str_split($horaire->lundi); }
        if ($int_jour == 2) { $chars = str_split($horaire->mardi); }
        if ($int_jour == 3) { $chars = str_split($horaire->mercredi); }
        if ($int_jour == 4) { $chars = str_split($horaire->jeudi); }
        if ($int_jour == 5) { $chars = str_split($horaire->vendredi); }

        for($char = 0; $char < 20; $char++) {
            if ($heure_array[$char] == "1")
            {
                if ($heure_array[$char] == $chars[$char]) return false;
            }
        }

        //aucun probleme detecter apres toutes les validations
        return true;
    }
}
