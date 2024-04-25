<?php

namespace App\Http\Controllers\medecin\singlePage;

use App\Http\Controllers\Controller;
use App\Models\Medecin\Event;
use App\Models\Medecin\Medecin;
use App\Models\Medecin\Reaction;
use App\Models\RendezVous;
use App\Repositories\reaction\ReactionInterfaceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SinglePageController extends Controller
{
    // public function index(){
    //     // $medecins = Medecin::all();
    //     return view("medecin.singlePage.index");
    // }
    public function __construct(ReactionInterfaceRepository $reactionRepository)
    {
        $this->reactionRepository = $reactionRepository;
    }
    public function show($id)
    {
        $medecin = Medecin::with('specialite')
            ->join('users', 'medecins.user_id', '=', 'users.id')
            ->join('villes', 'users.ville_id', '=', 'villes.id')
            ->select('medecins.*', 'users.nom as user_name', 'users.email as user_email', 'users.numero as telephone', 'villes.nom as location')
            ->findOrFail($id);
        $posts = \DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->leftJoin('reactions', 'posts.id', '=', 'reactions.post_id')
            ->where('users.id', $medecin->user_id)
            ->select('posts.*', \DB::raw('COUNT(reactions.id) as reactions_count'))
            ->groupBy('posts.id')
            ->get();


        $decinsMemeSpecialite = Medecin::where('specialite_id', $medecin->specialite_id)
            ->where('medecins.id', '!=', $id)
            ->whereExists(function ($query) {
                $query->select(\DB::raw(1))
                    ->from('users')
                    ->whereColumn('users.id', 'medecins.user_id');
            })
            ->get();
        $events = Event::where('user_id', $medecin->user_id)
            ->where('status', 'active')
            ->get();
        return view("medecin.singlePage.index", compact('medecin', 'posts', 'decinsMemeSpecialite', 'events'));
    }

    public function reserve(Request $request)
    {
        $rendezVous = new RendezVous();
        $rendezVous->user_id = auth()->id(); // ID de l'utilisateur authentifié
        $rendezVous->medecin_id = $request->medecin_id; // ID du médecin associé au rendez-vous (vous devez obtenir cela de la requête)
        $rendezVous->event_id = $request->event_id; // ID de l'événement associé au rendez-vous (vous devez obtenir cela de la requête)
        $rendezVous->save();
        return redirect()->back()->with('message', 'votre demande a été bien envoyer');
    }



}