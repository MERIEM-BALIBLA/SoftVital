<?php

namespace App\Models\Medecin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use HasFactory;

    protected $fillable = ['specialite'];

    public function medecin(){
        return $this->hasMany(Medecin::class);
    }
}
