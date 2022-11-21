<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'datePaiement',
        'location_id',
        'user_id',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
