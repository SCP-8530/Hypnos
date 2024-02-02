<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @author Philippe Bertrand
 */
class Bloc_cours extends Model
{
    use HasFactory;

    protected $table = 'bloc_cours';
    protected $fillable = [
        'jour',
        'heures'
    ];
    public function propriolocal()
    {
        return $this->belongsTo(Local::class);
    }
    public function groupe_cours()
    {
        return $this->hasMany(GroupeCours::class);
    }

}
