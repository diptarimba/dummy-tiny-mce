<?php

use App\Http\Controllers\EditorController;
use Illuminate\Support\Facades\Route;

Route::post('/upload', [EditorController::class, 'upload_image']);
Route::post('/postdata', [EditorController::class, 'post_data'])->name('posts.ini');
Route::get('/', [EditorController::class, 'index']);
