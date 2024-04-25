<?php

namespace App\Http\Controllers\medecin\post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\medecin\Post;
use App\Repositories\post\PostInterfaceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // $posts = Post::where('user_id', $utilisateur->id)->get();

        $utilisateur = auth()->user(); // Si vous utilisez l'authentification utilisateur
        
        $posts = Post::where('posts.user_id', $utilisateur->id)
        ->leftJoin('reactions', 'posts.id', '=', 'reactions.post_id')
        ->select('posts.*', DB::raw('COUNT(reactions.id) as count'))
        ->groupBy('posts.id')
        ->get();
    


        return view('medecin/post/index', compact('posts'));
        // return view('medecin/profil/index', compact('posts'));
    }

    public function create()
    {
        return view('medecin/post/create');
    }

    public function store(PostRequest $postRequest)
    {
        $this->postRepository->createPost($postRequest);
        // Gate::authorize('modifier-poste', $post);

        return redirect()->back()->with('seccess', 'Votre poste a bien enregistre');
    }

    public function edit($id)
    {
        $post = $this->postRepository->findPost($id);
        $user = auth()->user();
        // if(!Gate::allows('modifier-poste', $post)){
        //     abort(403);
        // }
        Gate::authorize('update', $post);
        return view('medecin/post/edit', ['post' => $post]);
        // return view('medecin/profil/index', compact('post', 'user'));
    }

    public function update(PostRequest $postRequest, $id)
    {
        $this->postRepository->updatePost($postRequest, $id);
        return redirect()->route('dash.profile')->with('seccess', 'Votre poste a bien enregistre');
    }


    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        $this->postRepository->deletePost($post);
        return redirect()->back();
    }
}
