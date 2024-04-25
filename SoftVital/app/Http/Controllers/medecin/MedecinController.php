<?php

namespace App\Http\Controllers\medecin;

use App\Http\Controllers\Controller;
use App\Models\Medecin\Event;
use App\Models\Medecin\Medecin;
use App\Models\Medecin\Specialite;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MedecinController extends Controller
{


    public function search(Request $request)
    {
        $query = Medecin::leftJoin('users', 'medecins.user_id', '=', 'users.id');
        if (!empty($request->search)) {
            $query = $query->where('users.nom', 'like', '%' . $request->search . '%');
        }
        else if (!empty($request->specialite) && $request->specialite != 0) {
            $query = $query->where('specialite_id', $request->specialite);
        }
        else if (!empty($request->ville) && $request->ville != 0) {
            $query = $query->leftJoin('villes', 'users.ville_id', '=', 'villes.id');
            $query = $query->where('ville_id', $request->ville);
        }
       
        // If all inputs are empty, fetch all doctors
    if (empty($request->search) && empty($request->specialite) && empty($request->ville)) {
        $medecins = Medecin::all();
    }
        
        $medecins = $query->get();

        $aujourdhui = Carbon::today();
        $horaireTravail = Event::where('type', 'travail')
            ->whereDate('start', $aujourdhui)
            ->where('status', 'active')
            ->take(8) // Limitez les résultats à 4 événements
            ->get();
        return response()->json([
            'status'=> true,
            'view' => view('SoftVital/liste',compact('medecins', 'aujourdhui', 'horaireTravail'))->render(),
            "token"  => $request->header("X-CSRF-TOKEN")
        ]);
    }

   
    
}
