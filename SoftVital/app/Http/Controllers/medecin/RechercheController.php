<?php

namespace App\Http\Controllers\medecin;

use App\Http\Controllers\Controller;
use App\Repositories\recherche\RechercheInterfaceRepository;
use Illuminate\Http\Request;

class RechercheController extends Controller
{
    public function __construct(RechercheInterfaceRepository $rechercheRepository)
    {
        $this->rechercheRepository=$rechercheRepository;
    }
    public function search(Request $request)
    {
        return $this->rechercheRepository->recherche($request);
    }
}
