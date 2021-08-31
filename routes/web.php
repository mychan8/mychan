<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

/* POST */
Route::get('b', [homeController::class, 'index']);
Route::get('b/{post}', [homeController::class, 'showBlog']);

/* COMENTAR */
Route::post('post', [homeController::class, 'saveRemark']);


/* ESTATICO */
/* Iniciar sesion */
Route::view('sign-in', 'login');
/* FAQ */
Route::view('faq', 'faq');
/* Registro */
Route::view('sign-up', 'register');

Route::post('sign-in', [homeController::class, 'signIn']);
Route::post('sign-up', [homeController::class, 'signUp']);

Route::get('logout', [HomeController::class, 'logout']);