<?php
namespace App\Repositories\recherche;
use Illuminate\Http\Request;

interface RechercheInterfaceRepository
{
  public function recherche(Request $request);
}