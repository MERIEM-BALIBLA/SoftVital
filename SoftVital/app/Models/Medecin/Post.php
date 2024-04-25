<?php

namespace App\Models\medecin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','title','description','image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

    public function userHasReacted()
    {
        // Vérifie si l'utilisateur actuel a déjà réagi au post
        return $this->reactions()->where('user_id', auth()->id())->exists();
    }

}
