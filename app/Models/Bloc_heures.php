<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @author Philippe Bertrand
 */
class Bloc_heures extends Model
{

    use HasFactory;
    protected $table = 'bloc_heures';
    protected $fillable = [
        'jour',
        'heures',
        'contrainte_id',
    ];

    /**
     * @author Guillaume Paoli
     * Relation
     */
    public function contraintes()
    {
        return $this->belongsTo(Contrainte::class, "contrainte_id");
    }

}
