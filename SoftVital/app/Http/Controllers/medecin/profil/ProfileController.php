<?php

namespace App\Http\Controllers\medecin\profil;

use App\Http\Controllers\Controller;
use App\Models\medecin\Post;
use App\Models\Medecin\Specialite;
use App\Models\Ville;
use App\Repositories\profile\ProfileInterfaceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct(ProfileInterfaceRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
        // $this->postRepository = $postRepository;
    }

    public function index()
    {
        $user = auth()->user();
        $specialites = $this->profileRepository->getAllSpecialites();
        $posts = Post::where('user_id', $user->id)
            ->with('reactions')->withCount('reactions')
            ->get();
        $villes = Ville::get();
        return view('medecin.profil.index', compact('user', 'specialites', 'posts', 'villes'));
    }

    public function update_InfoPersonnelle(Request $request)
    {
        $request->validate([
            'nom' => 'string|max:255',
            'email' => 'email|max:255',
            'numero' => 'string|max:20',
            'ville' => 'string'
        ]);

        $user = auth()->user();

        $updated = $this->profileRepository->updateUserInfo($user, $request->all());

        if ($updated) {
            return redirect()->back()->with('success', 'Vos informations ont été mises à jour avec succès.');
        } else {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour de vos informations.');
        }
    }

    public function update_Proffesionnel(Request $request)
    {
        $request->validate([
            'specialite' => 'string|max:255',
            'cabinet' => 'string|max:255',
            'adresse' => 'string|max:255',
        ]);

        $user = auth()->user();
        $medecin = $user->medecin;

        $updated = $this->profileRepository->updateProffesionInfo($medecin, $request->all());

        if ($updated) {
            return redirect()->back()->with('success', 'Vos informations ont été mises à jour avec succès.');
        } else {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour de vos informations.');
        }
    }

    public function uploadProfileImage(Request $request)
    {
        $medecin = Auth::user()->medecin;

        $request->validate([
            'image' => 'required'
            // |image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048, // Taille maximale de 2 Mo
        ]);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('public/profil', 'public');

            $medecin->update(['image' => $imagePath]);

            return redirect()->back()->with('success', 'Photo de profil mise à jour avec succès.');
        }

        return redirect()->back()->with('error', 'Une erreur est survenue lors du téléchargement de la photo de profil.');
    }

    public function deleteProfileImage(Request $request)
    {
        $user = Auth::user();
        $user->update(['image' => NULL]);
        return redirect()->back()->with('success', 'Photo de profil supprimée avec succès.');
    }
}
