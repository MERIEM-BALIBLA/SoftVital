<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Medecin\Medecin;
use App\Models\User;
use App\Repositories\compte\CompteInterfaceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class compteController extends Controller
{
    public function __construct(CompteInterfaceRepository $compteRepository)
    {
        $this->compteRepository = $compteRepository;
    }
    public function index()
    {
        return $this->compteRepository->index();
    }

    public function compteActive()
    {
        return $this->compteRepository->compteA();
    }

    public function compteInactive()
    {
        return $this->compteRepository->compteI();
    }


    public function changeStatut($id)
    {
        return $this->compteRepository->editStatut($id);
    }

    // public function changeStatut($medecinId, $newStatut)
    // {
    //     $medecin = Medecin::findOrFail($medecinId);
    //     $medecin->statut = $newStatut;
    //     $medecin->save();
    // }

    // public function render()
    // {
    //     return view('livewire.medecin-component', [
    //         'medecins' => Medecin::all(),
    //     ]);
    // }

    public function delete()
    {
        // $user = Auth::user();
        // $user->delete();
        // Auth::logout();
        // return redirect()->route('/')->with('success', 'Votre compte a été supprimé avec succès.');
        return $this->compteRepository->supprimerCompte();
    }
}
