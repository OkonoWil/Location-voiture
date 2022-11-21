<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retour extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateRetour',
        'client_id',
        'etat_id',
        'user_id',
        'location_id',
    ];

    public function etat()
    {
        return $this->belongsTo(Etat::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
