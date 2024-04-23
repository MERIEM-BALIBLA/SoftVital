<?php

namespace App\Http\Controllers\medecin\reservation;

use App\Http\Controllers\Controller;
use App\Models\RendezVous;
<<<<<<< HEAD
use App\Repositories\reservation\ReservationInterfaceRepository;
=======
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
use Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
<<<<<<< HEAD

    public function __construct(ReservationInterfaceRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }
    public function index()
    {
        // $medecinId = Auth::id();
        // $reservations = RendezVous::where('medecin_id', $medecinId)
        //     ->join('users', 'rendez-vous.user_id', '=', 'users.id')
        //     ->join('events', 'rendez-vous.event_id', '=', 'events.id')

        //     ->select('users.nom as nom', 'users.email as email', 'events.start as debut', 'events.end as fin', 'events.status as statut', 'rendez-vous.*')

        //     ->get();
        // return view("medecin.reservation.index", compact('reservations'));
        return $this->reservationRepository->index();
    }

    public function updateReservation(Request $request, $id)
    {
        // $reservation = RendezVous::findOrFail($id);

        // $request->validate([
        //     'statut' => 'required|in:accepter,refuser,en atente', // Make sure the status is one of these three values
        // ]);

        // // Update the status of the reservation
        // $reservation->reservation = $request->statut; // Corrected attribute name
        // $reservation->save();

        // // Update the status of the associated event if the reservation is accepted
        // if ($request->statut === 'accepter') {
        //     $event = $reservation->event; // Assuming you have a relationship defined between RendezVous and Event models
        //     if ($event) {
        //         $event->status = 'inactive';
        //         $event->save();
        //     }
        // }

        // return redirect()->back();
        return $this->reservationRepository->updateRes($request, $id);
    }
=======
    public function index(){
        $medecinId = Auth::id(); 
        $reservations = RendezVous::where('medecin_id', $medecinId)
        ->join('users', 'rendez-vous.user_id', '=', 'users.id')
        ->join('events', 'rendez-vous.event_id', '=', 'events.id')

        ->select('users.nom as nom', 'users.email as email', 'events.start as debut', 'events.end as fin', 'events.status as statut', 'rendez-vous.*')

        ->get();
            return view("medecin.reservation.index", compact('reservations'));
    }


    // public function updateReservation(Request $request, $id)
    // {
    //     $reservation = RendezVous::findOrFail($id);
    //     // dd($reservation);
    //     $request->validate([
    //         'statut' => 'required|in:accepter,refuser,en attente', // Assurez-vous que le statut est l'une de ces trois valeurs
    //     ]);
    
    //     $reservation->reservation = $request->statut; // Assurez-vous que le champ dans la base de données est correct
    //     $reservation->save();
    //     return redirect()->back();
    // }
    public function updateReservation(Request $request, $id)
{
    $reservation = RendezVous::findOrFail($id);

    $request->validate([
        'statut' => 'required|in:accepter,refuser,en atente', // Make sure the status is one of these three values
    ]);

    // Update the status of the reservation
    $reservation->reservation = $request->statut; // Corrected attribute name
    $reservation->save();

    // Update the status of the associated event if the reservation is accepted
    if ($request->statut === 'accepter') {
        $event = $reservation->event; // Assuming you have a relationship defined between RendezVous and Event models
        if ($event) {
            $event->status = 'inactive';
            $event->save();
        }
    }

    return redirect()->back();
}
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
}

