<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Tourist\tourist;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified',"istourist"])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get("/tourist/home/{perpage?}",[tourist::class,"index"])->middleware("istourist");
Route::get("/search",[tourist::class,"search"]);
Route::get("/test",[tourist::class,"search"]);

require __DIR__.'/auth.php';
