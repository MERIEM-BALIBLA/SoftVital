<?php

namespace App\Repositories\profile;

use App\Models\Medecin\Medecin;
use App\Models\Medecin\Specialite;
use App\Models\User;

class ProfileRepository implements ProfileInterfaceRepository
{
    public function getAllSpecialites()
    {
        return Specialite::get();
    }

    public function updateUserInfo(User $user, array $data)
    {
        $user->nom = $data['nom'] ?? $user->nom;
        $user->email = $data['email'] ?? $user->email;
        $user->numero = $data['numero'] ?? $user->numero;
        $user->ville_id = $data['ville'] ?? $user->ville_id; // Utilisez "ville_id" au lieu de "ville"

        return $user->save();
    }

    public function updateProffesionInfo(Medecin $medecin, array $data)
    {
        $medecin->specialite_id = $data['specialite'] ?? $medecin->specialite_id;
        $medecin->cabinet = $data['cabinet'] ?? $medecin->cabinet;
        $medecin->adresse_cabinet = $data['adresse'] ?? $medecin->adresse_cabinet;

        return $medecin->save();
    }

}
