<?php
namespace App\Repositories\recherche;
use App\Models\Medecin\Event;
use App\Models\Medecin\Medecin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RechercheRepository implements RechercheInterfaceRepository
{
    public function recherche(Request $request){
        $query = Medecin::leftJoin('users', 'medecins.user_id', '=', 'users.id');
        if (!empty($request->search)) {
            $query = $query->where('users.nom', 'like', '%' . $request->search . '%');
        } else if (!empty($request->specialite) && $request->specialite != 0) {
            $query = $query->where('specialite_id', $request->specialite);
        } else if (!empty($request->ville) && $request->ville != 0) {
            $query = $query->leftJoin('villes', 'users.ville_id', '=', 'villes.id');
            $query = $query->where('ville_id', $request->ville);
        }
        $medecins = $query->get();

        if (empty($request->search) && empty($request->specialite) && empty($request->ville)) {
            $medecins = Medecin::all();
        }
        $aujourdhui = Carbon::today();
        $horaireTravail = Event::where('type', 'travail')
            ->whereDate('start', $aujourdhui)
            ->where('status', 'active')
            ->take(8) // Limitez les résultats à 4 événements
            ->get();
        return response()->json([
            'status' => true,
            'view' => view('SoftVital/liste', compact('medecins', 'aujourdhui', 'horaireTravail'))->render(),
            "token" => $request->header("X-CSRF-TOKEN")
        ]);
    }
}