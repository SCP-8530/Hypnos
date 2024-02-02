<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @author Guillaume Paoli
 */
class Campus extends Model
{
    //table
    protected $table = 'campus';

    //factory
    use HasFactory;

    //protection des donnees
    protected $fillable = [
        'nom'
    ];

    /**
     * @author Philippe Bertrand
     */
    public function groupeCours()
    {
        return $this->hasOne(GroupeCours::class);
    }
}
