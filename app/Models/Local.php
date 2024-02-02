<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @author Guillaume Paoli
 */
class Local extends Model
{
    //table
    protected $table = "locals";

    protected $fillable = [
        'no_local',
        'capacite'
    ];

    /**
     * @author Philippe Bertrand
     * Relation
     */
    public function proprio() : BelongsTo
    {
        return $this->belongsTo(Horaires::class, 'horaire_id');
    }
    public function BlocCours()
    {
        return $this->hasOne(Bloc_cours::class);
    }

    public function modif_proprio($horaire_id):void{
        $this->proprio()->associate($horaire_id);
        $this->save();
    }
    public function retirerHoraire(){
        $this->proprio()->disassociate();
        $this->save();
    }

    //factory
    use HasFactory;
}
