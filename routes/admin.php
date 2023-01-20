<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\VenueController;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'admin/events');

Route::resource('events', EventController::class)
    ->except('show');

Route::resource('venues', VenueController::class)
    ->except('show');
