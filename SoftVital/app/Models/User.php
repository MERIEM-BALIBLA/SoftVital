<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Medecin\Medecin;
use App\Models\medecin\Post;
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
        'nom',
        'cin',
        'numero',
        'ville_id',
        'role_id',
        'email',
        'password',
    ];

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
        'password' => 'hashed',
    ];

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function role()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    // Modèle User
    public function medecin()
    {
        return $this->hasOne(Medecin::class);
    }

<<<<<<< HEAD
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function hasRole($role)
    {
        return $this->role()->where('role', $role)->exists();
    }
    

=======
    public function posts(){
        return $this->hasMany(Post::class);
    }
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
}
