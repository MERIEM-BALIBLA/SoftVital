<?php

namespace App\Http\Controllers\reaction;

use App\Http\Controllers\Controller;
use App\Repositories\reaction\ReactionInterfaceRepository;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    public function __construct(ReactionInterfaceRepository $reactionRepository)
    {
        $this->reactionRepository = $reactionRepository;
    }

    public function index()
    {

    }

    public function store(Request $request)
    {
        return $this->reactionRepository->addReact($request);
    }

    public function destroy($id){
        return $this->reactionRepository->deleteReact($id);
    }
}
