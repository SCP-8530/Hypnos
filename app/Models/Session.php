<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @author Philippe Bertrand
 */
class Session extends Model
{
    use HasFactory;

    protected $fillable = [
       'annee',
       'session'
    ];
    public function groupeCours()
    {
        return $this->hasOne(GroupeCours::class);
    }
}
