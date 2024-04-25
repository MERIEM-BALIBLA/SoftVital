<?php
namespace App\Repositories\reservation;

use App\Models\Medecin\Reaction;
use App\Models\Medecin\Specialite;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationRepository implements ReservationInterfaceRepository
{

    public function index()
    {
        $medecinId = Auth::id();
        $reservations = RendezVous::where('medecin_id', $medecinId)
            ->join('users', 'rendez-vous.user_id', '=', 'users.id')
            ->join('events', 'rendez-vous.event_id', '=', 'events.id')

            ->select('users.nom as nom', 'users.email as email', 'events.start as debut', 'events.end as fin', 'events.status as statut', 'rendez-vous.*')

            ->paginate(8);
        return view("medecin.reservation.index", compact('reservations'));
    }
    public function updateRes(Request $request, $id)
    {
        $reservation = RendezVous::findOrFail($id);
        // dd($request);

        $request->validate([
            'statut' => 'required|in:accepter,refuser,en atente', 
        ]);

        $reservation->reservation = $request->statut; 
        $reservation->save();

        if ($request->statut === 'accepter') {
            $event = $reservation->event;
            if ($event) {
                $event->status = 'inactive';
                $event->save();
            }
        }
        if ($request->statut === 'en atente' || $request->statut === 'refuser') {
            $event = $reservation->event; 
            if ($event) {
                $event->status = 'active';
                $event->save();
            }
        }

        return redirect()->back();
    }
}