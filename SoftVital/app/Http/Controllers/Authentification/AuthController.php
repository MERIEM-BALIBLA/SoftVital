<?php

namespace App\Http\Controllers\Authentification;

use App\Http\Controllers\Controller;
use App\Models\Medecin\Medecin;
use App\Models\Medecin\Specialite;
use App\Models\Role;
use App\Models\User;
use App\Repositories\AuthInterfaceRepository;
use App\Repositories\MailRepository;

use App\Http\Requests\RegisterRequest;
use App\Models\Ville;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(AuthInterfaceRepository $authInterfaceRepository)
    {
        $this->userRepository = $authInterfaceRepository;
    }


    public function index()
    {
        return $this->userRepository->index();
    }

    // start register
    public function register(RegisterRequest $request)
    {
        $this->userRepository->createUser($request);
        
        // Vérifie si le champ 'role' dans la demande a la valeur 'medecin'
        if ($request->role === 'medecin') {
            return redirect()->back()->with('success', 'Le compte a été créé avec succès. Vous êtes maintenant enregistré en tant que médecin.');
        } else {
            return redirect('/');
        }
    }
    
    
    // end register

    // start logout
    public function logout(Request $request)
    {
        $this->userRepository->logout($request);
        return redirect()->route('/');
    }
    // end login

    // start login
    public function login(Request $request)
    {
        // if($request->hasRole('mdecin'))
        return $this->userRepository->login($request);
    }
    // end login

    public function ForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $email = $request->email;

        $user = $this->userRepository->getUserByEmail($email);

        if ($user) {
            $userName = $user->nom; // Supposons que le nom d'utilisateur soit stocké dans la colonne 'name' de votre table 'users'

            $token = Str::random(64);
            $this->userRepository->createOrUpdatePasswordResetToken($email, $token);
            $this->userRepository->sendPasswordResetEmail($email, $token, $userName);

            return redirect()->to('Authentification')->with("success", "we have sent an email with instructions to reset your password.");
        } else {
            return redirect()->back()->with("error", "No user found with this email address");
        }
    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:4',
        ]);

        $email = $request->email;
        $password = $request->password;

        if ($this->userRepository->resetPassword($email, $password)) {
            return redirect('Authentification')->with('status', 'Your password has been reset!');
        } else {
            return back()->withErrors(['email' => 'User not found']);
        }
    }
}


