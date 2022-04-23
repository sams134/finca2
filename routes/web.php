<?php

use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\OwnersController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TypesController;
use App\Http\Livewire\Animals\CreateBulk;
use App\Http\Livewire\Animals\LiveAnimalsIndex;
use App\Http\Livewire\Animals\LiveAnimalsShow;
use App\Http\Livewire\Animals\ShowAnimals;
use App\Http\Livewire\DashboardView;
use Illuminate\Support\Facades\Route;

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

Route::get('/',DashboardView::class);


Route::resource('/colors', ColorsController::class);
Route::resource('/owners', OwnersController::class);
Route::resource('/types', TypesController::class);
Route::resource('/status', StatusController::class);

Route::get('/animals',LiveAnimalsIndex::class)->name('animals.index');
Route::get('/animals/create',[AnimalsController::class,'create'])->name('animals.create');
Route::get('/animals/create_bulk',CreateBulk::class)->name('animals.create_bulk');
Route::post('/animals',[AnimalsController::class,'store'])->name('animals.store');
Route::get('animals/{animal}/edit',[AnimalsController::class,'edit'])->name('animals.edit');
Route::put('animals/{animal}', [AnimalsController::class,'update'])->name('animals.update');
Route::get('animals/{animal}',LiveAnimalsShow::class)->name('animals.show');
Route::get('animals/getWeights/{id}',[AnimalsController::class,'getWeights']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', DashboardView::class)->name('dashboard');
