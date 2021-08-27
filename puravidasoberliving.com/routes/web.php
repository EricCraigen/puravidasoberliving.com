<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Forward_Facing_App\StaticPagesController;

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
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
