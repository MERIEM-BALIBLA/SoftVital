<?php

namespace App\Http\Controllers\medecin\singlePage;

use App\Http\Controllers\Controller;
use App\Models\Medecin\Event;
use App\Models\Medecin\Medecin;
use App\Models\Medecin\Reaction;
use App\Models\RendezVous;
use App\Repositories\reaction\ReactionInterfaceRepository;
use App\Repositories\singlePage\SinglePageInterfaceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SinglePageController extends Controller
{
    // public function index(){
    //     // $medecins = Medecin::all();
    //     return view("medecin.singlePage.index");
    // }
    public function __construct(SinglePageInterfaceRepository $singlePageRepository)
    {
        // $this->reactionRepository = $reactionRepository;
        $this->singlePageRepository = $singlePageRepository;
    }
    public function show($id)
    {
        return $this->singlePageRepository->show($id);
    }

    public function reserve(Request $request)
    {
        return $this->singlePageRepository->reserve($request);
    }



}