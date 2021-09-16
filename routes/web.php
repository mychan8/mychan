<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

/* POST */
Route::get('p', [HomeController::class, 'index']);
Route::get('p/{post}', [HomeController::class, 'showBlog']);

/* COMENTAR */
Route::post('post', [HomeController::class, 'saveRemark']);


/* ESTATICO */
/* Iniciar sesion */
Route::view('sign-in', 'sign');
/* FAQ */
Route::view('faq', 'faq');
/* Registro */
Route::view('sign-up', 'sign');

Route::post('sign-in', [HomeController::class, 'signIn']);
Route::post('sign-up', [HomeController::class, 'signUp']);

Route::get('logout', [HomeController::class, 'logout']);

Route::get('b', [HomeController::class, 'index']);

/* BOARD AKA PERFIL */
Route::get('b/{board}', [HomeController::class, 'board']);
/*  */
Route::post('b/create-post', [HomeController::class, 'createPost']);