<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\LoanController;

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
    // return view('welcome');
    return redirect('/items');
});

Route::get('/useGuide', function () {
    return view('useGuide');
})->middleware(['auth', 'verified'])->name('useGuide');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Items
Route::resource('items', ItemController::class)->middleware('auth');

// Boxes
Route::resource('boxes', BoxController::class)->middleware('auth');

// Update box_id of items from the boxes.edit view
Route::patch('/update-item-box/{item}', [BoxController::class, 'updateItemBox']);

// Loans
Route::resource('loans', LoanController::class)->middleware('auth');

require __DIR__ . '/auth.php';
