<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PagesController;
use App\Http\Livewire\Payment\Wizard;
use App\Http\Livewire\ShowCart;
use App\Http\Livewire\ShowProduct;
use App\Http\Middleware\EnsureCartIsBigEnough;
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
    Route::get('/mentions-legales', [PagesController::class, 'mentionsLegales'])->name('mentions-legales');
    Route::get('/conditions-generales-de-ventes', [PagesController::class, 'cgv'])->name('cgv');
    Route::get('/politique-de-confidentialite', [PagesController::class, 'poliqueDeConfidentialite'])->name('politique-de-confidentialite');
    Route::get('/faq', [PagesController::class, 'FAQ'])->name('faq');
    Route::view('/servir-parfaitement', 'pages.servir')->name('servir');
    Route::view('/contact', 'pages.contact')->name('contact');
    Route::post('/contact', [PagesController::class, 'getContactFrom'])->name('send-contact');
    Route::get('/boutique', [PagesController::class, 'shop'])->name('boutique');
    Route::get('/categorie/{slug}',  [PagesController::class, 'category'])->name('category');

    Route::get('/produit/{slug}', ShowProduct::class)->name('product');
    Route::get('/panier', ShowCart::class)->name('panier');
    Route::middleware(EnsureCartIsBigEnough::class)->prefix('/paiement')->group(function () {
        Route::get('/', [CheckoutController::class, 'showAddressForm'])->name('paiement');
        Route::post('/', [CheckoutController::class, 'getAddressForm'])->name('checkout-address');
        Route::get('/method', [CheckoutController::class, 'showPaymentMethodForm'])->name('checkout-payment-method-form');
        Route::post('/method', [CheckoutController::class, 'getPaymentMethod'])->name('checkout-payment-method');
        Route::get('/summary', [CheckoutController::class, 'showSummary'])->name('checkout-summary');
        Route::post('/summary', [CheckoutController::class, 'getSummary'])->name('checkout-summary-send');
        Route::get('/valide/{id}', [PagesController::class, 'paymentAccepted'])->name('paiement-valide')->middleware('signed');
        Route::get('/virement/{id}', [PagesController::class, 'waitingForTransfer'])->name('transfer')->middleware('signed');
    });
});
