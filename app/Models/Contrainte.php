<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @author Philippe Bertrand
 */
class Contrainte extends Model
{
    use HasFactory;

    protected $table = 'contraintes';

    protected $fillable = [
        'nom',
        'stricte',
        'enseignant_id'
    ];

    /**
     * @author Guillaume Paoli
     * Relation
     */
    public function bloc_heures()
    {
        return $this->hasMany(Bloc_heures::class);
    }

    public function cheminements()
    {
        return $this->belongsToMany(Cheminements::class, 'cheminement_contrainte', 'contrainte_id', 'cheminement_id');
    }

    public function enseignant(){

        return $this->belongsTo(Enseignant::class, 'enseignant_id');
    }
}
