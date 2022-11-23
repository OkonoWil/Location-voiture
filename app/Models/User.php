<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastName',
        'username',
        'email',
        'sexe',
        'phone1',
        'phone2',
        'photo',
        'role_id',
        'password',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
    public function retours()
    {
        return $this->hasMany(Retour::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
