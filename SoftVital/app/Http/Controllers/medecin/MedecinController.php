<?php

namespace App\Http\Controllers\medecin;

use App\Http\Controllers\Controller;
use App\Models\Medecin\Medecin;
use App\Models\Medecin\Specialite;
use App\Models\Ville;
use Illuminate\Http\Request;
use Log;

class MedecinController extends Controller
{
    public function search(Request $request)
    {
        $searchString = $request->search_input;
        // Log::info('Contenu de $searchString : ' . $searchString);

        // dd($searchString);
        // // $searchSpecialite = $request->specialite;

        // // $specialite = Specialite::get();
        $query = Medecin::query();
        if (!empty($searchString)) {
            $query->where('nom', 'like', "%$searchString%");
        }
        // if (!empty($searchSpecialite)) {
        //     $query->where('specialite_id', $searchSpecialite); // Assuming specialite_id is the foreign key in Medecin table
        // }
        $medecins = $query->get();

    }
}
