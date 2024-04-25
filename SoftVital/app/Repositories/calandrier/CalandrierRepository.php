<?php

namespace App\Repositories\Calandrier;

use App\Models\Medecin\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class CalandrierRepository implements CalandrierInterfaceRepository
{

    public function getEvenements()
    {
        $user = Auth::user();
        return Event::where('user_id', $user->id)
            ->where('type', 'evenement')
        ->get();
        // return Event::where('user_id', $user->id)
        //     ->where('type', 'evenement')
        //     ->paginate(8);
    }

    public function getHoraire()
    {
        $user = Auth::user();
        return Event::where('user_id', $user->id)
            ->where('type', 'travail')
            ->get();
    }


    public function divideTime($totalHours, $division)
    {
        $totalMinutes = $totalHours * 60; // Convertir les heures en minutes

        // Déterminer la taille de l'intervalle en fonction de la division saisie
        switch ($division) {
            case '15min':
                $interval = 15;
                break;
            case '20min':
                $interval = 20;
                break;
            case '30min':
                $interval = 30;
                break;
            // case '40min':
            //     $interval = 40;
            //     break;
            default:
                // Valeur par défaut si la division n'est pas reconnue
                $interval = 30; // Utilisation d'une valeur par défaut de 30 minutes
        }
        $result = [];
        // Diviser la durée totale en tranches de la taille de l'intervalle
        while ($totalMinutes >= $interval) {
            $result[] = $interval;
            $totalMinutes -= $interval;
        }
        // Ajouter les minutes restantes si elles ne remplissent pas un intervalle complet
        if ($totalMinutes > 0) {
            $result[] = $totalMinutes;
        }
        return $result;
    }

    public function createEvent(Request $request)
    {
        // public function createEvent(Request $request){
        $user = auth()->user();

        $validatedData = $request->validate(
            [
                'title' => 'required|max:30|min:5',
            ],
            [
                // 'title.required' => 'Le titre est requis.',
                'title.min' => 'Le titre doit contient au minimun 5 caractères.',

                'title.max' => 'Le titre ne peut pas dépasser 30 caractères.',
                // Autres messages d'erreur personnalisés ici
            ]
        );

        // $title = $request->input("title");
        $title = $validatedData['title'];

        $range = $request->input("rangepick");
        $type = $request->input("type");
        $division = $request->input("division");
        // dd($request);

        $dates = explode(' - ', $range);
        $start_datetime = Carbon::parse($dates[0]);
        $end_datetime = Carbon::parse($dates[1]);
        if ($start_datetime->isToday() || $start_datetime->isFuture()) {
            if ($division) {
                // Diviser la durée de l'événement en tranches plus petites en utilisant la fonction divideTime
                $durationInHours = $start_datetime->diffInHours($end_datetime);
                $dividedTime = $this->divideTime($durationInHours, $division);
            } else {
                // Si aucune division n'a été sélectionnée, traiter l'événement comme une unité
                $dividedTime = [$start_datetime->diffInMinutes($end_datetime)];
            }
            // Enregistrer chaque tranche de temps comme un événement séparé
            $events = [];
            $currentDateTime = $start_datetime;
            foreach ($dividedTime as $time) {
                $event = new Event();
                $event->title = $title;
                $event->start = $currentDateTime;
                $currentDateTime = $currentDateTime->copy()->addMinutes($time); // Ajouter la durée de la tranche
                $event->end = $currentDateTime;
                $event->type = $type;
                $event->user_id = $user->id; // Définir la valeur de 'user_id'

                $event->save();
                $events[] = $event;
            }
        } else {
            throw new \Exception('La date de début de l\'événement est antérieure à aujourd\'hui. Veuillez choisir une date de début valide.');
        }
    }

    public function destroyEvent($id)
    {
        Event::destroy($id);
    }

    public function updateEvent(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->title = $request['title'];
        $event->start = $request['start'];
        $event->end = $request['end'];
        $event->type = $request['type'];
        $event->status = $request['status'];
        $event->save();
    }

    public function getEventJson(Request $request)
    {
        $user = $request->user();

        // Récupérer les événements de l'utilisateur authentifié
        $events = Event::whereDate('start', '>=', $request->start)
            ->whereDate('end', '<=', $request->end)
            ->where('user_id', $user->id) // Supposons que l'identifiant de l'utilisateur est stocké dans la colonne user_id
            ->get();

        return $events;
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

    public function EdithandleEvent(Request $request)
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
    }
}