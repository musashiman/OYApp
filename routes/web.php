<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OyappController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(OyappController::class)->middleware(["auth"])->group(function(){
    
Route::get("/","index")->name('index');
Route::get("/oyapps/create","create")->name("create");
Route::get("/oyapps/{oyapp}","show")->name("show");
Route::post('/oyapps', "store")->name("store");
Route::get('/oyapps/{oyapp}/edit', "edit")->name("edit");
Route::put("/oyapps/{oyapp}","update")->name("update");
Route::delete("/oyapps/{oyapp}","delete")->name("delete");
Route::post("/oyapps/{oyapp}/follow","follow")->name("follow");
Route::delete("/oyapps/{oyapp}/unfollow","unfollow")->name("unfollow");
    
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
