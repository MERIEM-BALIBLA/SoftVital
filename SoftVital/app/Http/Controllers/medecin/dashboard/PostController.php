<?php

namespace App\Http\Controllers\medecin\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\medecin\Post;
use App\Repositories\post\PostInterfaceRepository;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
=======
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    protected $postRepository ;

    public function __construct(PostInterfaceRepository $postInterfaceRepository)
    {
        $this->postRepository = $postInterfaceRepository;
    }

    public function index()
    {
        $utilisateur = auth()->user();
<<<<<<< HEAD
        // $posts = Post::where('user_id', $utilisateur->id)->get();

        $utilisateur = auth()->user(); // Si vous utilisez l'authentification utilisateur
        
        $posts = Post::where('posts.user_id', $utilisateur->id)
        ->leftJoin('reactions', 'posts.id', '=', 'reactions.post_id')
        ->select('posts.*', DB::raw('COUNT(reactions.id) as count'))
        ->groupBy('posts.id')
        ->get();
    


        return view('medecin/post/index', compact('posts'));
        // return view('medecin/profil/index', compact('posts'));
=======
        $posts = Post::where('user_id', $utilisateur->id)->get();
        return view('medecin/post/index', compact('posts'));
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
    }

    public function create()
    {
        return view('medecin/post/create');
    }

    public function store(PostRequest $postRequest)
    {
        $this->postRepository->createPost($postRequest);
<<<<<<< HEAD
        // Gate::authorize('modifier-poste', $post);

        return redirect()->back()->with('seccess', 'Votre poste a bien enregistre');
=======
        return redirect()->route('dashboard_medecin')->with('seccess', 'Votre poste a bien enregistre');
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
    }

    public function edit($id)
    {
        $post = $this->postRepository->findPost($id);
<<<<<<< HEAD
        $user = auth()->user();
        // if(!Gate::allows('modifier-poste', $post)){
        //     abort(403);
        // }
        Gate::authorize('update', $post);
        return view('medecin/post/edit', ['post' => $post]);
        // return view('medecin/profil/index', compact('post', 'user'));
=======
        // if(!Gate::allows('modifier-poste', $post)){
        //     abort(403);
        // }
        Gate::authorize('modifier-poste', $post);
        return view('medecin/post/edit', ['post' => $post]);
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
    }

    public function update(PostRequest $postRequest, $id)
    {
        $this->postRepository->updatePost($postRequest, $id);
        return redirect()->route('dashboard_medecin')->with('seccess', 'Votre poste a bien enregistre');
    }


    public function destroy(Post $post)
    {
<<<<<<< HEAD
        Gate::authorize('delete', $post);
        $this->postRepository->deletePost($post);
        return redirect()->back();
=======
        Gate::authorize('suprimer-poste', $post);
        $this->postRepository->deletePost($post);
        return redirect()->route('dashboard_medecin');
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
    }
}
