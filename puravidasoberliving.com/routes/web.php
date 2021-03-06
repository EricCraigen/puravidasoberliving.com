<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Forward_Facing_App\StaticPagesController;
use App\Http\Controllers\Forward_Facing_App\RentalApplicationController;
use App\Http\Controllers\Forward_Facing_App\ContactPageController;
use App\Http\Controllers\DashboardController;

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

Route::prefix('/')->group(function () {

    Route::get(
        '/',
        [StaticPagesController::class, 'getWelcomePage']
    )->name('welcome'); 

    Route::get(
        '/mission',
        [StaticPagesController::class, 'getMissionPage']
    )->name('mission');

    Route::get(
        '/à-la-carte-recovery',
        [StaticPagesController::class, 'getALaCarteRecoveryPage']
    )->name('a-la-carte-recovery');

    Route::get(
        '/apply-now',
        [RentalApplicationController::class, 'getRentalApplicationPage']
    )->name('apply-now');

    Route::get(
        '/contact-us',
        [ContactPageController::class, 'getContactUsPage']
    )->name('contact');
});

Route::prefix('/dashboard')->group(function () {

    Route::get(
        '/',
        [DashboardController::class, 'getDashboardHome']
    )->middleware(['auth', 'verified'])->name('dashboard');

    Route::get(
        '/user-management',
        [DashboardController::class, 'getUserManagement']
    )->middleware(['auth', 'verified'])->name('dashboard.user-management');

});

require __DIR__ . '/auth.php';
