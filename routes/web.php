<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ContactSourceController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Default route for dashboard
Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user && $user->is_admin) {
        return redirect()->route('admin.dashboard');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('contact-sources', ContactSourceController::class)->names('admin.contact-sources');
    Route::resource('contacts', ContactController::class)->names('admin.contacts');
    Route::resource('leads', LeadController::class)->names('admin.leads');
});
require __DIR__ . '/auth.php';
