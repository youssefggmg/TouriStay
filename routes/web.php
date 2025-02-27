<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tourist\tourist;
use App\Http\Controllers\owner\owner;

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
    Route::get("/test",[tourist::class,"editForm"]);
    Route::get("/tourist/profile",[tourist::class,"profile"]);
    Route::get("/tourist/editform",[tourist::class,"editForm"]);
    Route::patch("/tourist/edit",[tourist::class,"updateUserInfo"]);
});

Route::get("/test",[owner::class,"index"]);

require __DIR__.'/auth.php';
