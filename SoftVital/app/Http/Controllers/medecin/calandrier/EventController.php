<?php

namespace App\Http\Controllers\medecin\calandrier;

use App\Http\Controllers\Controller;
use App\Models\Medecin\Event;
use App\Repositories\Calandrier\CalandrierInterfaceRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(CalandrierInterfaceRepository $calandrierRepository)
    {
        $this->calandrierRepository = $calandrierRepository;
    }
    public function index()
    {
<<<<<<< HEAD
=======
        // $user = Auth::user();
        // $evenements = Event::where('user_id', $user->id)
        //     ->where('type', 'evenement')
        //     ->get();
        // $travaux = Event::where('user_id', $user->id)
        //     ->where('type', 'travail')
        //     ->get();
        // return view('medecin/calendrier/index', compact('evenements', 'travaux'));
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
        $evenements = $this->calandrierRepository->getEvenements();
        $travaux = $this->calandrierRepository->getHoraire();

        return view('medecin/calendrier/index', compact('evenements', 'travaux'));
    }
<<<<<<< HEAD

    public function store(Request $request)
    {
        // $this->calandrierRepository->createEvent($request);
        // return redirect()->back();
        try {
            $result = $this->calandrierRepository->createEvent($request);
            if ($result === true) {
                return redirect()->back();
            } else {
                // Si la méthode retourne quelque chose d'autre que true, redirigez avec un message d'erreur générique
                return redirect()->back();
            }
        } catch (\Exception $e) {
            // Si une exception est lancée, récupérez le message d'erreur et redirigez avec ce message
            $errorMessage = $e->getMessage();
            return redirect()->back()->with('error', $errorMessage);
        }
=======
    // public function divideTime($totalHours, $division)
    // {
    //     $totalMinutes = $totalHours * 60; // Convertir les heures en minutes

    //     // Déterminer la taille de l'intervalle en fonction de la division saisie
    //     switch ($division) {
    //         case '15min':
    //             $interval = 15;
    //             break;
    //         case '20min':
    //             $interval = 20;
    //             break;
    //         case '30min':
    //             $interval = 30;
    //             break;
    //         // case '40min':
    //         //     $interval = 40;
    //         //     break;
    //         default:
    //             // Valeur par défaut si la division n'est pas reconnue
    //             $interval = 30; // Utilisation d'une valeur par défaut de 30 minutes
    //     }
    //     $result = [];
    //     // Diviser la durée totale en tranches de la taille de l'intervalle
    //     while ($totalMinutes >= $interval) {
    //         $result[] = $interval;
    //         $totalMinutes -= $interval;
    //     }
    //     // Ajouter les minutes restantes si elles ne remplissent pas un intervalle complet
    //     if ($totalMinutes > 0) {
    //         $result[] = $totalMinutes;
    //     }
    //     return $result;
    // }


    public function create(Request $request)
    {
        // $user = auth()->user();

        // $title = $request->input("title");
        // $range = $request->input("rangepick");
        // $type = $request->input("type");
        // $division = $request->input("division");
        // // dd($request);

        // $dates = explode(' - ', $range);
        // $start_datetime = Carbon::parse($dates[0]);
        // $end_datetime = Carbon::parse($dates[1]);
        // if ($division) {
        //     // Diviser la durée de l'événement en tranches plus petites en utilisant la fonction divideTime
        //     $durationInHours = $start_datetime->diffInHours($end_datetime);
        //     $dividedTime = $this->divideTime($durationInHours, $division);
        // } else {
        //     // Si aucune division n'a été sélectionnée, traiter l'événement comme une unité
        //     $dividedTime = [$start_datetime->diffInMinutes($end_datetime)];
        // }
        // // Enregistrer chaque tranche de temps comme un événement séparé
        // $events = [];
        // $currentDateTime = $start_datetime;
        // foreach ($dividedTime as $time) {
        //     $event = new Event();
        //     $event->title = $title;
        //     $event->start = $currentDateTime;
        //     $currentDateTime = $currentDateTime->copy()->addMinutes($time); // Ajouter la durée de la tranche
        //     $event->end = $currentDateTime;
        //     $event->type = $type;
        //     $event->user_id = $user->id; // Définir la valeur de 'user_id'

        //     $event->save();
        //     $events[] = $event;
        // }
        
        // return redirect()->back()->with('events', $events);
        $this->calandrierRepository->createEvent($request);
        return redirect()->back();

>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
    }

    public function destroy(Request $request, $id)
    {
<<<<<<< HEAD
        $this->calandrierRepository->destroyEvent($id);
        $activeTab = $request->input('activeTab');
=======
        // Supprimer l'événement
        Event::destroy($id);
        // $this->calandrierRepository->destroyEvent($id);
        // Récupérer l'onglet actif à partir de la requête
        $activeTab = $request->input('activeTab');

        // Comparer l'onglet actif à 'tab2' et 'tab3' et rediriger en conséquence
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
        if ($activeTab === 'tab2') {
            return redirect()->back()->with('activeTab', 'tab2');
        } elseif ($activeTab === 'tab3') {
            return redirect()->back()->with('activeTab', 'tab3');
        }
<<<<<<< HEAD
    }

    public function update(Request $request, $id)
    {
        $this->calandrierRepository->updateEvent($request, $id);

        $activeTab = $request->input('activeTab');
        if ($activeTab === 'tab2') {
            return redirect()->back()->with('activeTab', 'tab2');
        } elseif ($activeTab === 'tab3') {
            return redirect()->back()->with('activeTab', 'tab3');
        }
=======
        // Si l'onglet actif n'est ni 'tab2' ni 'tab3', vous pouvez définir une valeur par défaut
        // return redirect()->back()->with('activeTab', 'tab1');
    }



    public function update(Request $request, $id)
    {
        // Récupérez l'événement à mettre à jour
        $event = Event::findOrFail($id);
        $event->title = $request['title'];
        $event->start = $request['start'];
        $event->end = $request['end'];
        $event->type = $request['type'];
        $event->status = $request['status'];
        $event->save();
        return redirect()->back()->with('activeTab', 'tab3');
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
    }

    public function getevents(Request $request)
    {
<<<<<<< HEAD
        // $user = $request->user();
        $events = $this->calandrierRepository->getEventJson($request);
        return response()->json($events);
    }

    // popup edit
    public function handleEvent(Request $request)
    {
        $this->calandrierRepository->handleEvent($request);
    }

    public function updateevent(Request $request)
    {
        $this->calandrierRepository->EdithandleEvent($request);
        return redirect()->back();
    }

    // public function translateUpdate(Request $request)
    // {
    //     // dd($request);
    //     $eventid = $request->input("eventid");
    //     $newStartDate = $request->input("new_start_date");
    //     $newEndDate = $request->input("new_end_date");

    //     // Vérifier si l'événement existe
    //     $event = Event::findOrFail($eventid);

    //     // Mettre à jour les dates de début et de fin de l'événement
    //     $event->start = $newStartDate;
    //     $event->end = $newEndDate;

    //     // Enregistrer les modifications dans la base de données
    //     $event->save();

    //     // Rediriger l'utilisateur vers une autre page ou afficher à nouveau la vue de calendrier
    //     return response()->json(['message' => 'Événement mis à jour avec succès']);
    // }
=======
        // Récupérer l'utilisateur authentifié
        $user = $request->user();

        // Récupérer les événements de l'utilisateur authentifié
        $events = Event::whereDate('start', '>=', $request->start)
            ->whereDate('end', '<=', $request->end)
            ->where('user_id', $user->id) // Supposons que l'identifiant de l'utilisateur est stocké dans la colonne user_id
            ->get();

        return response()->json($events);
    }

    public function handleEvent(Request $request)
    {
        $eventId = $request->input('eventId');
        $event = Event::find($eventId);

        if (!$event) {
            return response()->json(['error' => 'Event not found'], 404);
        }

        return response()->json(['event' => $event]);
    }


    public function updateevent(Request $request)
    {
        $eventid = $request->input("eventid");
        $event = Event::findOrFail($eventid);
        $range2 = $request->input("rangepick");
        $dates = explode(' - ', $range2);
        $start_datetime = Carbon::parse($dates[0]);
        $end_datetime = Carbon::parse($dates[1]);
        $event->start = $start_datetime;
        $event->end = $end_datetime;
        $event->save();
        return redirect()->back();
    }
    public function translateUpdate(Request $request)
    {
        // dd($request);
        $eventid = $request->input("eventid");
        $newStartDate = $request->input("new_start_date");
        $newEndDate = $request->input("new_end_date");

        // Vérifier si l'événement existe
        $event = Event::findOrFail($eventid);

        // Mettre à jour les dates de début et de fin de l'événement
        $event->start = $newStartDate;
        $event->end = $newEndDate;

        // Enregistrer les modifications dans la base de données
        $event->save();

        // Rediriger l'utilisateur vers une autre page ou afficher à nouveau la vue de calendrier
        return response()->json(['message' => 'Événement mis à jour avec succès']);
    }
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340


}
