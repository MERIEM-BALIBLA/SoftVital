<?php

namespace App\Repositories\Calandrier;
use Illuminate\Http\Request;
interface CalandrierInterfaceRepository
{
    // public function getAllSpecialites();
    // public function updateUserInfo(User $user, array $data);
    // public function updateProffesionInfo(Medecin $medecin, array $data);
    public function getEvenements();

    public function getHoraire();
    public function divideTime($totalHours, $division);
    public function createEvent(Request $request);
<<<<<<< HEAD
    public function destroyEvent($id);
    public function updateEvent(Request $request, $id);
    public function getEventJson(Request $request);
    public function handleEvent(Request $request);
    public function EdithandleEvent(Request $request);
=======
    public function destroyEvent(Request $request, $id);

>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
}