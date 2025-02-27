<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tourist\tourist;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified',"istourist"])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware("istourist")->group(function(){
    Route::get("/tourist/home/{perpage?}",[tourist::class,"index"]);
    Route::get("/search",[tourist::class,"search"]);
    // Route::get("/profile",[tourist::class,"profile"]);
});
Route::get("/test",[tourist::class,"editForm"]);

require __DIR__.'/auth.php';
