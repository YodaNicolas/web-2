<?php

namespace App\Models;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'manager_id',
        'nom',
        'passe1',
        'passe2',
        'date',
        'debut',
        'heure',
        'fin',
        'lieu',
        'affiche',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
