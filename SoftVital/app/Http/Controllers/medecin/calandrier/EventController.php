<?php

namespace App\Http\Controllers\medecin\calandrier;

use App\Http\Controllers\Controller;
use App\Models\Medecin\Event;
use App\Repositories\Calandrier\CalandrierInterfaceRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(CalandrierInterfaceRepository $calandrierRepository)
    {
        $this->calandrierRepository = $calandrierRepository;
    }
    public function index()
    {
        $evenements = $this->calandrierRepository->getEvenements();
        $travaux = $this->calandrierRepository->getHoraire();

        return view('medecin/calendrier/index', compact('evenements', 'travaux'));
    }

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
    }

    public function destroy(Request $request, $id)
    {
        $this->calandrierRepository->destroyEvent($id);
        $activeTab = $request->input('activeTab');
        if ($activeTab === 'tab2') {
            return redirect()->back()->with('activeTab', 'tab2');
        } elseif ($activeTab === 'tab3') {
            return redirect()->back()->with('activeTab', 'tab3');
        }
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
    }

    public function getevents(Request $request)
    {
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


}
