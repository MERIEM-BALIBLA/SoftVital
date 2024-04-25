<?php

namespace App\Http\Controllers\medecin\reservation;

use App\Http\Controllers\Controller;
use App\Models\RendezVous;
use App\Repositories\reservation\ReservationInterfaceRepository;
use Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function __construct(ReservationInterfaceRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }
    public function index()
    {
        return $this->reservationRepository->index();
    }

    public function updateReservation(Request $request, $id)
    {
        return $this->reservationRepository->updateRes($request, $id);
    }
}

