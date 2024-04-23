<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Medecin\Medecin;
=======
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
use App\Models\medecin\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
<<<<<<< HEAD
        $posts = Post::with('reactions')->withCount('reactions')->get();
        $medecins = Medecin::join('users', 'users.id', '=', 'medecins.user_id')
        ->select('users.nom as name', 'users.email as email', 'users.numero as telephone','medecins.*')
        ->get();
        return view('SoftVital/index',compact('posts', 'medecins'));
=======
        $posts = Post::get();
        
        return view('SoftVital/index',compact('posts'));
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
    }
}
