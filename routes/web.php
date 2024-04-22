<?php

use App\Http\Controllers\EditorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EditorController::class, 'index']);
Route::post('/upload', [EditorController::class, 'upload_image']);
