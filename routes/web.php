<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\KantoHome;
use App\Livewire\RegionPage;
use App\Livewire\HomePage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/kanto', KantoHome::class)->name('kanto-home')->middleware('region.check');
Route::get('/home', HomePage::class)->name('home');
Route::get('/{region}/starters', RegionPage::class)->name('region-page')
->middleware('region.check')
;

