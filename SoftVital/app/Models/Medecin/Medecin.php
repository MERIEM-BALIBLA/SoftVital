<?php

namespace App\Models\Medecin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','specialite_id','cabinet','adresse_cabinet','ville_id','image'];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function specialite(){
        return $this->belongsTo(Specialite::class);
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }

    
    
}
