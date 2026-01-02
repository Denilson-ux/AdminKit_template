<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

require(base_path('routes/route-list/route-auth.php'));

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('empleados', EmpleadoController::class);
});