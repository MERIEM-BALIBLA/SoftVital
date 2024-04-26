<?php

namespace App\Repositories\compte;
use App\Http\Requests\PostRequest;
use App\Models\medecin\Post;

interface CompteInterfaceRepository
{
   public function index();

   public function compteA();
   public function compteI();
   public function editStatut($id);
   public function supprimerCompte();
}