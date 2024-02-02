<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @author Philippe Bertrand
 */
class Enseignant extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'bureau',
        'poste',
        'user_id',
        'horaire_id'
    ];

    public function proprio(): BelongsTo
    {
        return $this->belongsTo(Horaires::class, 'horaire_id');
    }

    public function modif_proprio($horaire_id):void{
        $this->proprio()->associate($horaire_id);
        $this->save();
    }
    public function retirerHoraire(){
        $this->proprio()->disassociate();
        $this->save();
    }

    /**
     * @author Guillaume
     * Relation
     */
    public function contrainte()
    {
        return $this->hasMany(Contrainte::class);
    }

    public function groupeCours()
    {
        return $this->belongsToMany(GroupeCours::class, 'enseignant_groupe_cours', 'enseignant_id','groupe_cours_id');
    }

    public function user_proprio()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
