<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @author Philippe Bertrand
 */
class GroupeCours extends Model
{
    use HasFactory;

    protected $fillable = [

        'no_groupe',
        'nb_etudiants',
        'campus_id',
        'session_id',
        'cours_id'
    ];

    public function proprioBlocCours()
    {
        return $this->hasMany(Bloc_cours::class);
    }
    public function proprioSession()
    {
        return $this->belongsTo(Session::class,'session_id');
    }
    public function proprioCampus(){
        return $this->belongsTo(Campus::class,'campus_id');
    }
    public function proprioEnseignant(){
        return $this->belongsToMany(Enseignant::class,'enseignant_groupe_cours','groupe_cours_id','enseignant_id');
    }

    /**@author Guillaume Paoli*/
    public function proprioCours()
    {
        return $this->belongsTo(Cours::class, 'cours_id');
    }
    public function AjoutEnseignant(int $enseignant_id, int $id_gc)
    {
        DB::table('enseignant_groupe_cours')->insert([
            'groupe_cours_id' => $id_gc,
            'enseignant_id' => $enseignant_id
        ]);
    }

    public function SupprimerEnseignant(int $id_gc)
    {
        DB::table('enseignant_groupe_cours')->where('groupe_cours_id', $id_gc)->delete();
    }
}
