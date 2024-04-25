<?php

namespace App\Http\Controllers;

use App\Models\Medecin\Medecin;
use App\Models\medecin\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::with('reactions')->withCount('reactions')->get();
        $medecins = Medecin::join('users', 'users.id', '=', 'medecins.user_id')
        ->select('users.nom as name', 'users.email as email', 'users.numero as telephone','medecins.*')
        ->get();
        return view('SoftVital/index',compact('posts', 'medecins'));
    }
}
