<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Medecin\Medecin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class compteController extends Controller
{
    public function index()
    {
        $medecins = DB::table('users')
            ->join('medecins', 'users.id', '=', 'medecins.user_id')
            ->join('specialites', 'medecins.specialite_id', '=', 'specialites.id')
            ->select('users.nom', 'users.email', 'users.cin', 'specialites.specialite', 'medecins.*')
            ->get();
        return view('admin.dashboard.index', compact('medecins'));
    }

    public function compteActive()
    {
        $medecins = DB::table('users')
            ->join('medecins', 'users.id', '=', 'medecins.user_id')
            ->join('specialites', 'medecins.specialite_id', '=', 'specialites.id')
            ->where('medecins.statut', '=', 'active')
            ->select('users.nom', 'users.email', 'users.cin', 'specialites.specialite', 'medecins.*')
            ->get();
        return view('admin.dashboard.compteA', compact('medecins'));
    }

    public function compteInactive()
    {
        $medecins = DB::table('users')
            ->join('medecins', 'users.id', '=', 'medecins.user_id')
            ->join('specialites', 'medecins.specialite_id', '=', 'specialites.id')
            ->where('medecins.statut', '=', 'inactive')
            ->select('users.nom', 'users.email', 'users.cin', 'specialites.specialite', 'medecins.*')
            ->get();
        return view('admin.dashboard.compteI', compact('medecins'));
    }


    public function edit($id)
    {
        $medecin = Medecin::findOrFail($id);
        if ($medecin->statut === 'inactive') {
            $medecin->statut = 'active';
        } else {
            $medecin->statut = 'inactive';
        }
        $medecin->save();
        return redirect()->back();
    }
    public function changeStatut($medecinId, $newStatut)
    {
        $medecin = Medecin::findOrFail($medecinId);
        $medecin->statut = $newStatut;
        $medecin->save();
    }

    public function render()
    {
        return view('livewire.medecin-component', [
            'medecins' => Medecin::all(),
        ]);
    }

    public function delete()
    {
        $user = Auth::user();
        $user->delete();
        Auth::logout();
        return redirect()->route('/')->with('success', 'Votre compte a été supprimé avec succès.');
    }
}
