<?php

namespace App\Http\Controllers\medecin\dashboard;

use App\Http\Controllers\Controller;
use App\Models\medecin\Post;
use App\Models\Medecin\Specialite;
<<<<<<< HEAD
use App\Models\Ville;
use App\Repositories\profile\ProfileInterfaceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
=======
use App\Repositories\profile\ProfileInterfaceRepository;
use Illuminate\Http\Request;
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct(ProfileInterfaceRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
<<<<<<< HEAD
        // $this->postRepository = $postRepository;
=======
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
    }

    public function index()
    {
        $user = auth()->user();
<<<<<<< HEAD
        $specialites = $this->profileRepository->getAllSpecialites();
        $posts = Post::where('user_id', $user->id)
            ->with('reactions')->withCount('reactions')
            ->get();
        $villes = Ville::get();
        return view('medecin.profil.index', compact('user', 'specialites', 'posts', 'villes'));
=======
        // $posts = Post::where('user_id', $user->id)
        // ->latest()
        // ->take(3)
        // ->get();
        $specialites = $this->profileRepository->getAllSpecialites();
        return view('medecin.profil.index', compact('user', 'specialites'));
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
    }

    public function update_InfoPersonnelle(Request $request)
    {
        $request->validate([
            'nom' => 'string|max:255',
            'email' => 'email|max:255',
            'numero' => 'string|max:20',
<<<<<<< HEAD
            'ville' => 'string'
=======
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
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

<<<<<<< HEAD
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
=======
    // public function uploadProfileImage(Request $request)
    // {
    //     // Récupérer l'utilisateur authentifié
    //     $user = auth()->user();
    
    //     // Valider la requête
    //     $request->validate([
    //         'image' => 'image|mimes:svg,png,jpg,jpeg', // Assurez-vous que le fichier est une image
    //     ]);
    
    //     // Vérifier s'il y a un fichier image envoyé
    //     if ($request->hasFile('image')) {
    //         // Récupérer le chemin de l'image actuelle de l'utilisateur
    //         $oldImagePath = $user->image;
    
    //         // Stocker la nouvelle image
    //         $imagePath = $request->file('image')->store('public/images'); // Assurez-vous que le répertoire de stockage existe
    
    //         // Mettre à jour le chemin de l'image dans les données de l'utilisateur
    //         $user->image = $imagePath;
    
    //         if ($oldImagePath) {
    //             Storage::delete($oldImagePath); // Supprimer l'image précédente du stockage
    //         }
    //     }

    //     // Sauvegarder les modifications de l'utilisateur
    //     $user->save();
    
    //     return redirect()->back()->with('success', 'Vos informations ont été mises à jour avec succès.');
    // }
    public function uploadProfileImage(Request $request){
        
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
    }
}
