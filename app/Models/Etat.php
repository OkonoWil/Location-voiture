<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{

    use HasFactory;
    protected $fillable = [
        'nomEtat',
        'montantDegat',
    ];

    public function retours()
    {
        return $this->hasMany(Retour::class);
    }
}
