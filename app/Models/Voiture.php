<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = [
        'modele',
        'immatriculation',
        'numeroSerie',
        'couleur',
        'dateDeFabri',
        'nombrePlace',
        'tarifParJour',
        'marque_id',
    ];

    public function marque()
    {
        return $this->belongsTo(Marque::class);
    }
    public function location()
    {
        return $this->hasMany(Location::class);
    }
}
