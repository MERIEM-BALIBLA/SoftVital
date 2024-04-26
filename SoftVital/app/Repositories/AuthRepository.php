<?php

namespace App\Repositories;

use App\Http\Requests\RegisterRequest;
use App\Models\Medecin\Medecin;
use App\Models\Medecin\Specialite;
use App\Models\Role;
use App\Models\User;
use App\Models\Ville;
use App\Repositories\AuthInterfaceRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class AuthRepository implements AuthInterfaceRepository
{


    public function index()
    {
        $villes = Ville::get();
        $specialites = Specialite::get();
        return view('Authentification.index', compact('villes', 'specialites'));
    }

    public function createUser(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        // Fetch the role ID based on the role selected in the form
        $role = Role::where('role', $validatedData['role'])->first();

        // Set the role_id to the fetched role's ID
        $validatedData['role_id'] = $role->id;

        // Récupérer l'ID de la ville à partir des données utilisateur
        $villeId = $validatedData['ville'];

        // Ajouter l'ID de la ville au tableau $validatedData
        $validatedData['ville_id'] = $villeId;

        try {
            // Créer l'utilisateur avec le rôle spécifié
            $user = User::create($validatedData);

            // Attacher le rôle à l'utilisateur
            $user->role()->attach($role->id);

            // Si le rôle est "médecin", valider les données spécifiques au médecin
            if ($role->role === 'medecin') {
                $specialite = $request->input('specialite');
                $medecinData = [
                    'user_id' => $user->id,
                    'specialite_id' => $specialite,
                    'cabinet' => $request->input('cabinet'),
                    'adresse_cabinet' => $request->input('adresse_cabinet'),
                    // 'image' => $request->input('image'),
                ];
                // Créer un médecin
                Medecin::create($medecinData);
            }

            // Connecter l'utilisateur
            // auth()->login($user);
            if ($role->role !== 'medecin') {
                auth()->login($user);
            }
            return redirect()->route('/');
        } catch (\PDOException $e) {
            if ($e->getCode() === '23000' && strpos($e->getMessage(), 'Duplicate entry') !== false) {
                return redirect('Authentification')->with("error", "L'adresse e-mail que vous avez entrée est déjà associée à un compte. Veuillez utiliser une autre adresse e-mail.");
            } else {
                return redirect('Authentification')->with("error", "Une erreur s'est produite lors de la création de votre compte. Veuillez réessayer plus tard.");
            }
        }
    }

    public function createMedecin(array $data)
    {
        return Medecin::create($data);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    // start login

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     // Tenter de s'authentifier avec les informations d'identification fournies
    //     $credentials = $request->only('email', 'password');

    //     if (auth()->attempt($credentials)) {
    //         // Si l'authentification réussit, régénérer la session et rediriger l'utilisateur vers la page d'accueil
    //         $request->session()->regenerate();
    //         return redirect()->route('/');
    //     } else {
    //         // Si l'authentification échoue, rediriger l'utilisateur vers la page de connexion avec un message d'erreur
    //         return back()->withInput()->withErrors(['email' => 'Email or password incorrect']);
    //     }
    // }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Utilisateur authentifié
            $user = auth()->user();
            if ($user->role->first()->role === 'admin') {
                $url = URL::to('/dashboard');
                return Redirect::to($url);
            }
            if ($user->role->first()->role === 'medecin') {
                // Vérifier si l'utilisateur est un médecin
                $medecin = Medecin::where('user_id', $user->id)->first();
                if ($medecin && $medecin->statut === 'active') {
                    // Si le médecin est actif, régénérer la session et rediriger vers la page d'accueil
                    $request->session()->regenerate();
                    return redirect()->route('/');
                } else {
                    // Si le médecin n'est pas actif ou n'existe pas, déconnecter l'utilisateur et afficher un message d'erreur
                    auth()->logout();
                    return back()->withInput()->withErrors(['email' => 'Votre compte médecin n\'est pas actif.']);
                }
            } else {
                // Si l'utilisateur est un patient, régénérer la session et rediriger vers la page d'accueil
                $request->session()->regenerate();
                return redirect()->route('/');
            }


        }

        // Si l'authentification échoue, rediriger vers la page de connexion avec un message d'erreur
        return back()->withInput()->withErrors(['email' => 'Email ou mot de passe incorrect']);
    }
    // end login

    public function getUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function createOrUpdatePasswordResetToken($email, $token)
    {
        $existingEntry = DB::table('password_reset_tokens')->where('email', $email)->first();

        if ($existingEntry) {
            DB::table('password_reset_tokens')->where('email', $email)->update([
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        } else {
            DB::table('password_reset_tokens')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        }
    }

    public function sendPasswordResetEmail($email, $token, $userName)
    {
        Mail::send('email.forget_password', ['token' => $token, 'userName' => $userName], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Reset your password');
        });
    }

    public function resetPassword($email, $password)
    {
        $user = $this->getUserByEmail($email);

        if ($user) {
            // Mettre à jour le mot de passe de l'utilisateur
            $user->password = Hash::make($password);
            $user->save();

            return true; // Le mot de passe a été réinitialisé avec succès
        } else {
            return false; // Aucun utilisateur trouvé avec cet e-mail
        }
    }
}
