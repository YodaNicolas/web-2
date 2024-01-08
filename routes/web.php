<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('listev', function () {
//     return view('Manager.eventListe');
// });
// Route::get('det', function () {
//     return view('detail');
// });
// Route::get('prop', function () {
//     return view('propos');
// });
// Route::get('pub', function () {
//     return view('pulier');
// });
Route::get('/', [AdminController::class, 'Accueil'])->name('accueil');

Route::get('inscription', [AdminController::class, 'Inscription'])->name('inscription');

Route::post('enregistrement', [AdminController::class, 'Enregistrement'])->name('enregistrement');

Route::get('connexion', [AdminController::class, 'Connexion'])->name('login');

Route::post('authentification', [AdminController::class, 'Authetification'])->name('authetification');

Route::get('Reservation/{id_event}', [AdminController::class, 'Reserver'])->name('Reserver');

Route::post('Reserve', [AdminController::class, 'ReserveStore'])->name('StoreReservation');

Route::get('A propos', [AdminController::class, 'Propos'])->name('propos');

Route::get('details/{id_event}', [AdminController::class, 'Detail'])->name('detail');


// ROUTE ACCESSIBLE UNIQUEMENT AU UTILISATEUR CONNECTES
Route::middleware(['auth'])->group(
    function () {
        Route::get('Deconnexion', [AdminController::class, 'Deconnexion'])->name('deconnexion');

        Route::post('Suppression manager', [AdminController::class, 'SupprMang'])->name('SupprManager');

        Route::get('HomeAdmin/', [AdminController::class, 'HomeAdmin'])->name('HomeAdmin');

        Route::post('Manager page', [AdminController::class, 'getEvent'])->name('infoManager');

        Route::get('listeEvenements/{id_manager}', [AdminController::class, 'EvenListe'])->name('EvenListe');

        Route::get('Evenement/{id_event}', [AdminController::class, 'getEvent'])->name('infoEvent');


        Route::post('Validation/{id_reservat}/{NumRes}', [AdminController::class, 'ValidReserve'])->name('Validation');

        Route::post('Rejet/{id_reservat}/{NumRes}', [AdminController::class, 'RejetReserve'])->name('Rejet');

        Route::post('Suppression', [AdminController::class, 'SupprEvent'])->name('SupprEvent');

        Route::get('publication', [AdminController::class, 'Publication'])->name('publication');

        Route::post('publier', [AdminController::class, 'Publier'])->name('publier');
    }
);
