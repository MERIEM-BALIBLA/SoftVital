<?php

namespace App\Http\Controllers\medecin\singlePage;

use App\Http\Controllers\Controller;
use App\Models\Medecin\Event;
use App\Models\Medecin\Medecin;
<<<<<<< HEAD
use App\Models\Medecin\Reaction;
use App\Models\RendezVous;
use App\Repositories\reaction\ReactionInterfaceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
=======
use App\Models\RendezVous;
use Illuminate\Http\Request;
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340

class SinglePageController extends Controller
{
    // public function index(){
    //     // $medecins = Medecin::all();
    //     return view("medecin.singlePage.index");
    // }
<<<<<<< HEAD
    public function __construct(ReactionInterfaceRepository $reactionRepository)
    {
        $this->reactionRepository = $reactionRepository;
    }
=======
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
    public function show($id)
    {
        $medecin = Medecin::with('specialite')
            ->join('users', 'medecins.user_id', '=', 'users.id')
            ->join('villes', 'users.ville_id', '=', 'villes.id')
            ->select('medecins.*', 'users.nom as user_name', 'users.email as user_email', 'users.numero as telephone', 'villes.nom as location')
            ->findOrFail($id);
<<<<<<< HEAD
        $posts = \DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->leftJoin('reactions', 'posts.id', '=', 'reactions.post_id')
            ->where('users.id', $medecin->user_id)
            ->select('posts.*', \DB::raw('COUNT(reactions.id) as reactions_count'))
            ->groupBy('posts.id')
            ->get();


        $decinsMemeSpecialite = Medecin::where('specialite_id', $medecin->specialite_id)
=======

            // $posts = $medecin->user->post;

            $posts = \DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            
            ->where('users.id', $medecin->user_id)
            ->select('posts.*')
            ->get();

            $decinsMemeSpecialite = Medecin::where('specialite_id', $medecin->specialite_id)
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
            ->where('medecins.id', '!=', $id)
            ->whereExists(function ($query) {
                $query->select(\DB::raw(1))
                    ->from('users')
                    ->whereColumn('users.id', 'medecins.user_id');
            })
            ->get();
<<<<<<< HEAD
        $events = Event::where('user_id', $medecin->user_id)
            ->where('status', 'active')
            ->get();
        return view("medecin.singlePage.index", compact('medecin', 'posts', 'decinsMemeSpecialite', 'events'));
    }

    public function reserve(Request $request)
    {
=======

            $events = Event::where('user_id', $medecin->user_id)->get();

        return view("medecin.singlePage.index", compact('medecin','posts', 'decinsMemeSpecialite', 'events'));
    }

    public function reserve(Request $request){
        // dd($request);
        // $fileds = $request->validate([
        //     'nom' => 'required',
        //     'email' => 'required',
        //     'numero' => 'required'
        // ]);
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
        $rendezVous = new RendezVous();
        $rendezVous->user_id = auth()->id(); // ID de l'utilisateur authentifié
        $rendezVous->medecin_id = $request->medecin_id; // ID du médecin associé au rendez-vous (vous devez obtenir cela de la requête)
        $rendezVous->event_id = $request->event_id; // ID de l'événement associé au rendez-vous (vous devez obtenir cela de la requête)
        $rendezVous->save();
        return redirect()->back()->with('message', 'votre demande a été bien envoyer');
    }

<<<<<<< HEAD


=======
    
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
}