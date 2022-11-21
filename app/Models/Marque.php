<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomMarque',
        'paysMarque',
    ];

    public function voitures()
    {
        return $this->hasMany(Voiture::class);
    }
}
