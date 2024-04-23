<?php

namespace App\Models;

use App\Models\Medecin\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;
    protected $table = 'rendez-vous'; // Spécifiez le nom de la table explicitement

    protected $fillable = [
        'user_id',
        'medecin_id',
        'event_id',
        'reservation'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

}
