<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @author Philippe Bertrand
 */
class Cheminements extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_session',
        'nom',
        'horaire_id',
    ];

    /**
     * @author Guillaume Paoli
     * Relation
     */
    public function contraintes()
    {
        return $this->belongsToMany(Contrainte::class, 'cheminement_contrainte', 'cheminement_id', 'contrainte_id');
    }

    public function cours()
    {
        return $this->belongsToMany(Cours::class, 'cheminement_cours', 'cheminement_id', 'cours_id');
    }

    public function horaire()
    {
        return $this->belongsTo(Horaires::class,"horaire_id");
    }
    public function ajoutContrainte(Contrainte $contrainte): void
    {
        $this->contraintes()->attach($contrainte);
    }
}
