<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateDebut',
        'dateFin',
        'montant',
        'caution',
        'client_id',
        'voiture_id',
    ];
}
