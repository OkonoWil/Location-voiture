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
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }
    public function paiement()
    {
        return $this->hasOne(Paiement::class);
    }
    public function retour()
    {
        return $this->hasOne(Retour::class);
    }
}
