<?php

namespace App\Repositories\compte;

use App\Models\Medecin\Medecin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CompteRepository implements CompteInterfaceRepository
{
    public function index()
    {
        $medecins = User::join('medecins', 'users.id', '=', 'medecins.user_id')
            ->join('specialites', 'medecins.specialite_id', '=', 'specialites.id')
            ->select('users.nom', 'users.email', 'users.cin', 'specialites.specialite', 'medecins.*')
            ->get();
        return view('admin.dashboard.index', compact('medecins'));
    }

    public function compteA()
    {
        $medecins = User::join('medecins', 'users.id', '=', 'medecins.user_id')
            ->join('specialites', 'medecins.specialite_id', '=', 'specialites.id')
            ->where('medecins.statut', '=', 'active')
            ->select('users.nom', 'users.email', 'users.cin', 'specialites.specialite', 'medecins.*')
            ->get();
        return view('admin.dashboard.compteA', compact('medecins'));
    }

    public function compteI()
    {
        $medecins = User::join('medecins', 'users.id', '=', 'medecins.user_id')
            ->join('specialites', 'medecins.specialite_id', '=', 'specialites.id')
            ->where('medecins.statut', '=', 'inactive')
            ->select('users.nom', 'users.email', 'users.cin', 'specialites.specialite', 'medecins.*')
            ->get();
        return view('admin.dashboard.compteI', compact('medecins'));
    }

    public function editStatut($id){
        $medecin = Medecin::findOrFail($id);
        if ($medecin->statut === 'inactive') {
            $medecin->statut = 'active';
        } else {
            $medecin->statut = 'inactive';
        }
        $medecin->save();
        return redirect()->back();
    }

    public function supprimerCompte(){
        $user = Auth::user();
        $user->delete();
        Auth::logout();
        return redirect()->route('/')->with('success', 'Votre compte a été supprimé avec succès.');
    }
}