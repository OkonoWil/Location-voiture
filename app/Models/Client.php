<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastName',
        'email',
        'dateDeNaissance',
        'lieuDeNaissance',
        'nationalite',
        'ville',
        'pays',
        'Adresse',
        'sexe',
        'email',
        'phone1',
        'pieceIdentite',
        'numeroPieceIdentite',
        'photo',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function retours()
    {
        return $this->hasMany(Retour::class);
    }
    public function location()
    {
        return $this->hasMany(Location::class);
    }
}
