<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @author Philippe Bertrand
*/
class Cours extends Model
{
    use HasFactory;

    protected $fillable =[
       'code',
       'nom',
       'ponderation',
        'bloc'
    ];

    /**
     * @author Guillaume
     * Relation
    */
    public function cheminements()
    {
        return $this->belongsToMany(Cheminements::class, 'cheminement_cours', 'cours_id','cheminement_id');
    }

    public function groupecours()
    {
        return $this->hasMany(GroupeCours::class);
    }
    public function SupprimerCheminement(int $id_cours)
    {
        DB::table('cheminement_cours')->where('cours_id', $id_cours)->delete();
    }
}
