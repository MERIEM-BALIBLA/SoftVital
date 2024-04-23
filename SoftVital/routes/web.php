<?php

use App\Http\Controllers\admin\compteController;
use App\Http\Controllers\Authentification\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\medecin\calandrier\EventController;
use App\Http\Controllers\medecin\calandrier\ListeController;
use App\Http\Controllers\medecin\dashboard\PostController;
use App\Http\Controllers\medecin\dashboard\ProfileController;
<<<<<<< HEAD
use App\Http\Controllers\medecin\MedecinController;
use App\Http\Controllers\medecin\reservation\ReservationController;
use App\Http\Controllers\medecin\singlePage\SinglePageController;
use App\Http\Controllers\admin\specialite\SpecialiteController;
use App\Http\Controllers\reaction\ReactionController;
=======
use App\Http\Controllers\medecin\reservation\ReservationController;
use App\Http\Controllers\medecin\singlePage\SinglePageController;
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
use App\Http\Controllers\ReserveController;
use Illuminate\Support\Facades\Route;

Route::resource('/', HomeController::class)->names([
    'index' => '/'
]);

<<<<<<< HEAD
Route::resource('/Authentification', AuthController::class);
=======
Route::resource('/Authentification',AuthController::class);
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340

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
<<<<<<< HEAD
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

=======
]);

// profil--------------------------------------------
Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('dash.profile');
Route::put('/modifier_mes_informations_personnelles', [ProfileController::class, 'update_InfoPersonnelle'])->name('update_InfoPersonnelle');
Route::put('/modifier_mes_informations_professionnel', [ProfileController::class, 'update_Proffesionnel'])->name('updateProffesionInfo');
// Route::match(['put', 'post'], '/modifier_image', [ProfileController::class, 'uploadProfileImage'])->name('uploadProfileImage');
Route::put('/modifier_ma_photo_de_profile', [ProfileController::class, 'uploadProfileImage'])->name('uploadProfileImage');
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
// --------------------------------------------------

// single page---------------------------------------
Route::get('/single_page/{id}', [SinglePageController::class, 'show']);
Route::post('/faire un rendze-vous', [SinglePageController::class, 'reserve'])->name('rendez-vous');

// --------------------------------------------------

// calandrier 
<<<<<<< HEAD
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
=======
Route::get('getevents', [EventController::class, 'getevents'])->name('getevents');
Route::post('/calendar/mycalendar/editevent', [EventController::class, 'updateevent'])->name('mycalendar.editevent');

Route::resource('event', EventController::class)->names([
    'index' =>'calandrier',
    // 'create' => 'mycalendar.addevent',
    'destroy' => 'event.destroy',
    'update' => 'event.update'
]);
Route::post('event', [EventController::class, 'create'])->name('mycalendar.addevent');
// afficher infor
Route::post('event_id', [EventController::class, 'handleEvent'])->name('event_id');

// edit avec popup
Route::put('event-edit', [EventController::class, 'updateevent'])->name('mycalender.updateevent');

// edit avec translation
Route::put('event-edit-translate', [EventController::class, 'translateUpdate'])->name('translateevent');

// admin----------------------------------------------
Route::get('/dashboard', [compteController::class, 'index']);
Route::get('/liste_des_rendez-vous', [ListeController::class, 'index']);
Route::put('/medecin/{id}/edit', [compteController::class, 'edit'])->name('medecin.edit');
// compte active 
Route::get('/liste_des_comptes_actives', [compteController::class, 'compteActive']);
// compte inactive
Route::get('/liste_des_comptes_inactives', [compteController::class, 'compteInactive']);
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340


// ---------------------------------------------------
// reservation page ou il y a une liste pour les docteurs
Route::get('/docteur-profil', [ReserveController::class, 'index']);

// pages des reservation Medecin
Route::get('/liste-des-reservations', [ReservationController::class, 'index'])->name('Mes-rendez-vous');
<<<<<<< HEAD
Route::put('/reservation/{id}/statut', [ReservationController::class, 'updateReservation'])->name('reservation_statut')->middleware(['auth']);
// reserve page 
Route::post('/recherche', [MedecinController::class, 'search'])->name('filtre');

Route::get('404', function(){
    return view('SoftVital\errorPage');
});
=======
Route::put('/reservation/{id}/statut', [ReservationController::class, 'updateReservation'])->name('reservation_statut');
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
