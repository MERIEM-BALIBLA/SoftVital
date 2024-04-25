<?php

use App\Http\Controllers\admin\compteController;
use App\Http\Controllers\Authentification\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\medecin\calandrier\EventController;
// use App\Http\Controllers\medecin\calandrier\ListeController;
use App\Http\Controllers\medecin\post\PostController;
use App\Http\Controllers\medecin\profil\ProfileController;
use App\Http\Controllers\medecin\MedecinController;
use App\Http\Controllers\medecin\reservation\ReservationController;
use App\Http\Controllers\medecin\singlePage\SinglePageController;
use App\Http\Controllers\admin\specialite\SpecialiteController;
use App\Http\Controllers\reaction\ReactionController;
use App\Http\Controllers\ReserveController;
use App\Models\RendezVous;
use Illuminate\Support\Facades\Route;

Route::resource('/', HomeController::class)->names([
    'index' => '/'
]);

Route::resource('/Authentification', AuthController::class);

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth', [AuthController::class, 'login'])->name('login');

Route::get('/forget_password', function () {
    return view('Authentification.resset_form');
})->name('forget_password');

Route::post('/resset_form', [AuthController::class, 'ForgetPassword'])->name('resetPassword');

Route::post('/forget_password_form', [AuthController::class, 'ForgetPassword'])->name('Reset.password.form');

Route::get('/reset-password/{token}', function ($token) {
    return view('Authentification.new_password', compact('token'));
})->name('new_pass');

Route::post('/new_password', [AuthController::class, 'resetPassword'])->name('pass_form');



// Medecin Route 

Route::get('dash', function () {
    return view('medecin/index');
});

// 

// post
Route::resource('post', PostController::class)->names([
    'index' => 'dashboard_medecin',
    'create' => 'create',
    'store' => 'store',
    'edit' => 'edit',
    'update' => 'update',
    'destroy' => 'destroy',
])->middleware(['auth', 'medecin']);

// reaction
Route::resource('reaction', ReactionController::class)->names([
    'index' => 'nombre_reactions',
    'store' => 'add_reaction',
    'destroy' => 'delete_reaction'
])->middleware(['auth']);

// profil--------------------------------------------
Route::get('/mon_espace_personnelle', [ProfileController::class, 'index'])->name('dash.profile')->middleware(['auth', 'medecin']);
Route::put('/modifier_mes_informations_personnelles', [ProfileController::class, 'update_InfoPersonnelle'])->name('update_InfoPersonnelle')->middleware(['auth', 'medecin']);
Route::put('/modifier_mes_informations_professionnel', [ProfileController::class, 'update_Proffesionnel'])->name('updateProffesionInfo')->middleware(['auth', 'medecin']);
Route::delete('/supprimer_mon_compte', [compteController::class, 'delete'])->name('supprimer_mon_compte')->middleware(['auth', 'medecin']);
Route::put('/modifier_profil', [ProfileController::class, 'uploadProfileImage'])->name('Modifier_profil')->middleware(['auth', 'medecin']);
Route::put('/supprimer_photo_de_profil', [ProfileController::class, 'deleteProfileImage'])->name('supprimer_photo_profil')->middleware(['auth', 'medecin']);

// --------------------------------------------------

// single page---------------------------------------
Route::get('/single_page/{id}', [SinglePageController::class, 'show']);
Route::post('/faire un rendze-vous', [SinglePageController::class, 'reserve'])->name('rendez-vous');

// --------------------------------------------------

// calandrier 
// Route::get('getevents', [EventController::class, 'getevents'])->name('getevents')->middleware(['auth'])->middleware(['auth', 'medecin']);
Route::get('getevents', [EventController::class, 'getevents'])
    ->name('getevents')
    ->middleware('auth')
    ->middleware('medecin');

Route::post('/calendar/mycalendar/editevent', [EventController::class, 'updateevent'])->name('mycalendar.editevent')->middleware(['auth', 'medecin']);

Route::resource('event', EventController::class)->names([
    'index' => 'calandrier',
    'store' => 'mycalendar.addevent',
    'destroy' => 'event.destroy',
    'update' => 'event.update'
])->middleware(['auth', 'medecin']);
// Route::post('event', [EventController::class, 'create'])->name('mycalendar.addevent')->middleware(['auth', 'medecin']);

// afficher pop edit
Route::post('event_id', [EventController::class, 'handleEvent'])->name('event_id')->middleware(['auth', 'medecin']);

// edit avec popup
Route::put('event-edit', [EventController::class, 'updateevent'])->name('mycalender.updateevent')->middleware(['auth', 'medecin']);

// edit avec translation
// Route::put('event-edit-translate', [EventController::class, 'translateUpdate'])->name('translateevent')->middleware(['auth']);
// ---------------------------------------------------

// admin----------------------------------------------
Route::get('/dashboard', [compteController::class, 'index'])->middleware(['auth', 'admin']);
// Route::get('/liste_des_rendez-vous', [ListeController::class, 'index'])->middleware(['auth']);
Route::put('/medecin/{id}/edit', [compteController::class, 'edit'])->name('medecin.edit');
// compte active 
Route::get('/liste_des_comptes_actives', [compteController::class, 'compteActive'])->middleware(['auth', 'admin']);
// compte inactive
Route::get('/liste_des_comptes_inactives', [compteController::class, 'compteInactive'])->middleware(['auth', 'admin']);
// Gestion des specialites 
Route::resource('/specialite', SpecialiteController::class)->names([
    'index' => 'liste_des_specialites',
    'store' => 'ajouter_une_specialite',
    'update' => 'modifier_une_specialite',
    'destroy' => 'suprimer_une_specialite'
])->middleware(['auth', 'admin']);


// ---------------------------------------------------


// patient liste des rendez-vous
Route::get('liste_de_mes_rendez-vous', function(){
    $user = Auth::user();
    $reservations = RendezVous::where('rendez-vous.user_id', $user->id)
    ->leftJoin('events','rendez-vous.event_id', '=', 'events.id')
    ->leftJoin('medecins','rendez-vous.medecin_id', '=', 'medecins.id')
    ->leftJoin('users', 'medecins.user_id', '=', 'users.id')
    ->select('users.nom as medecin_nom', 'events.start as debut', 'events.end as fin', 'rendez-vous.reservation as statut')
    ->get();
    return view('patient/index', compact('reservations'));
});

// --------------------------------------------------

// reservation page ou il y a une liste pour les docteurs
Route::get('/docteur-profil', [ReserveController::class, 'index']);

// pages des reservation Medecin
Route::get('/liste-des-reservations', [ReservationController::class, 'index'])->name('Mes-rendez-vous');
Route::put('/reservation/{id}/statut', [ReservationController::class, 'updateReservation'])->name('reservation_statut')->middleware(['auth']);

// reserve page 
Route::get('/search', [MedecinController::class, 'search'])->name('search');


Route::get('404', function(){
    return view('SoftVital\errorPage');
});