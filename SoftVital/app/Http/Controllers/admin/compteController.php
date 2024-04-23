<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Medecin\Medecin;
use App\Models\User;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
use Illuminate\Support\Facades\DB;

class compteController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
=======
        // Récupérer les informations des médecins à partir des tables User et Medecin
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
        $medecins = DB::table('users')
            ->join('medecins', 'users.id', '=', 'medecins.user_id')
            ->join('specialites', 'medecins.specialite_id', '=', 'specialites.id')
            ->select('users.nom', 'users.email', 'users.cin', 'specialites.specialite', 'medecins.*')
            ->get();
<<<<<<< HEAD
        return view('admin.dashboard.index', compact('medecins'));
    }

    public function compteActive()
    {
=======

        return view('admin.dashboard.index', compact('medecins'));
    }

    public function compteActive(){
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
        $medecins = DB::table('users')
            ->join('medecins', 'users.id', '=', 'medecins.user_id')
            ->join('specialites', 'medecins.specialite_id', '=', 'specialites.id')
            ->where('medecins.statut', '=', 'active')
            ->select('users.nom', 'users.email', 'users.cin', 'specialites.specialite', 'medecins.*')
            ->get();
<<<<<<< HEAD
        return view('admin.dashboard.compteA', compact('medecins'));
    }

    public function compteInactive()
    {
=======
    
        return view('admin.dashboard.compteA', compact('medecins'));
    }

    public function compteInactive(){
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
        $medecins = DB::table('users')
            ->join('medecins', 'users.id', '=', 'medecins.user_id')
            ->join('specialites', 'medecins.specialite_id', '=', 'specialites.id')
            ->where('medecins.statut', '=', 'inactive')
            ->select('users.nom', 'users.email', 'users.cin', 'specialites.specialite', 'medecins.*')
            ->get();
<<<<<<< HEAD
        return view('admin.dashboard.compteI', compact('medecins'));
    }


    public function edit($id)
    {
        $medecin = Medecin::findOrFail($id);
=======
    
        return view('admin.dashboard.compteI', compact('medecins'));
    }
    

    public function edit($id){
        $medecin = Medecin::findOrFail($id);
    
        // Mettre à jour le statut en fonction de l'état actuel
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
        if ($medecin->statut === 'inactive') {
            $medecin->statut = 'active';
        } else {
            $medecin->statut = 'inactive';
        }
<<<<<<< HEAD
        $medecin->save();
=======
        
        // Sauvegarder les modifications
        $medecin->save();

>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
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
<<<<<<< HEAD

    public function delete()
    {
        $user = Auth::user();
        $user->delete();
        Auth::logout();
        return redirect()->route('/')->with('success', 'Votre compte a été supprimé avec succès.');
    }
=======
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
}
