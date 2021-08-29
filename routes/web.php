<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('faq', [homeController::class, 'showFAQ']);

Route::get('b', [homeController::class, 'index']);

Route::get('b/{box}', [homeController::class, 'showBlog']);

Route::post('post', [homeController::class, 'saveRemark']);