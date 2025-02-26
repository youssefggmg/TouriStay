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
Route::get("/tourist/home",function(){
    return view("tourist.home");
})->middleware("istourist");
Route::get("/test",[tourist::class,"index"]);

require __DIR__.'/auth.php';
