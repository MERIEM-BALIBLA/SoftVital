<?php
namespace App\Repositories\reservation;

use Illuminate\Http\Request;

interface ReservationInterfaceRepository
{
    public function index();
    public function updateRes(Request $request, $id);
}