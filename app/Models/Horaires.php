<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @author Guillaume
*/
class Horaires extends Model
{
    use HasFactory;

    //protection des donnees
    protected $fillable = [
        'lundi',
        'mardi',
        'mercredi',
        'jeudi',
        'vendredi'
    ];

    /**
     * @author Philippe
     * Relation
     */
    public function local()
    {
        return $this->hasOne(Local::class);
    }

    public function enseignants()
    {
        return $this->hasOne(Enseignant::class);
    }
    public function cheminements()
    {
        return $this->hasOne(Cheminements::class);
    }
}
