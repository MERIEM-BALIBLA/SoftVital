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
        // conversion h->min
        $totalMinutes = $totalHours * 60;

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
        $user = auth()->user();
        $validatedData = $request->validate(
            [
                'title' => 'required|max:30|min:5',
            ],
            [
                'title.min' => 'Le titre doit contient au minimun 5 caractères.',
                'title.max' => 'Le titre ne peut pas dépasser 30 caractères.',
            ]
        );

        $title = $validatedData['title'];
        $range = $request->input("rangepick");
        $type = $request->input("type");
        $division = $request->input("division");

        $dates = explode(' - ', $range);
        $start_datetime = Carbon::parse($dates[0]);
        $end_datetime = Carbon::parse($dates[1]);
        if ($start_datetime->isToday() || $start_datetime->isFuture()) {
            if ($division) {
                $durationInHours = $start_datetime->diffInHours($end_datetime);
                $dividedTime = $this->divideTime($durationInHours, $division);
            } else {
                $dividedTime = [$start_datetime->diffInMinutes($end_datetime)];
            }

            $events = [];
            $currentDateTime = $start_datetime;
            foreach ($dividedTime as $time) {
                $event = new Event();
                $event->title = $title;
                $event->start = $currentDateTime;
                $currentDateTime = $currentDateTime->copy()->addMinutes($time);
                $event->end = $currentDateTime;
                $event->type = $type;
                $event->user_id = $user->id;
                // n'ajoute pas event avec nom deja existe
                // $event->save();
                // $events[] = $event;
                // if ($event->type === 'evenement' && $event->title) {
                //     $existingEvent = Event::where('title', $event->title)->first();

                //     if (!$existingEvent) {
                //         $event->save();
                //         $events[] = $event;
                //     }
                // }
                // n'ajoute pas un event avec une duree existe
                // $overlappingEvents = Event::where('start', '<', $event->end)
                //     ->where('end', '>', $event->start)
                //     ->get();

                // if ($overlappingEvents->isEmpty()) {
                //     $event->save();
                //     $events[] = $event;
                // }
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