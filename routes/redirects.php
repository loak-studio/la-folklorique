<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/accueil/conditions-generales-de-ventes/', function () {
    return Redirect::to(route('cgv'), 301);
});

Route::get('/accueil/mentions-legales/', function () {
    return Redirect::to(route('mentions-legales'), 301);
});

Route::get('/commander-2/', function () {
    return Redirect::to(route('boutique'), 301);
});

Route::get('/points-de-ventes/', function () {
    return Redirect::to(route('points-de-vente'), 301);
});
