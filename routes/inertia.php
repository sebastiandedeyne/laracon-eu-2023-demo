<?php

use App\Http\Controllers\Inertia\EventController;
use Illuminate\Support\Facades\Route;

Route::resource('events', EventController::class)
    ->except('show');
