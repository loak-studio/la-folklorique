<?php

use App\Http\Controllers\PagesController;
use App\Http\Middleware\HandleCart;
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

require __DIR__ . '/redirects.php';

Route::middleware(HandleCart::class)->group(function () {
    Route::view('/', 'pages.homepage')->name('home');
    Route::get('/points-de-ventes', [PagesController::class, 'pointsOfSell'])->name('points-de-vente');
    Route::get('/paiement/valide/{id}', [PagesController::class, 'paymentAccepted'])->name('paiement-valide')->middleware('signed');
    Route::get('/mentions-legales', [PagesController::class, 'mentionsLegales'])->name('mentions-legales');
    Route::get('/conditions-generales-de-ventes', [PagesController::class, 'cgv'])->name('cgv');
    Route::get('/politique-de-confidentialite', [PagesController::class, 'poliqueDeConfidentialite'])->name('politique-de-confidentialite');
    Route::get('/faq', [PagesController::class, 'FAQ'])->name('faq');
    Route::view('/servir-parfaitement', 'pages.servir')->name('servir');
    Route::view('/contact', 'pages.contact')->name('contact');
    Route::post('/contact', [PagesController::class, 'getContactFrom'])->name('send-contact');

    Route::get('/boutique', [ShopController::class, 'shop'])->name('boutique');
    Route::get('/boutique/{slug}', [ShopController::class, 'product'])->name('produit');
    Route::get('/panier', [ShopController::class, 'cart'])->name('panier');
    Route::get('/paiement', [ShopController::class, 'payment'])->name('paiement'); //Composant livewire
});
