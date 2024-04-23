<?php

namespace App\Http\Controllers\comment;

use App\Http\Controllers\Controller;
use App\Repositories\comment\CommentInterfaceRepository;
use App\Repositories\reaction\ReactionInterfaceRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(CommentInterfaceRepository $commentRepository) {
        $this->commentRepository = $commentRepository;
    }

    public function store(){
        
    }
}
