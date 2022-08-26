<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaymentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth','verified'])->group( function(){
    Route::get('/client/deleted', [ClientController::class, 'deleted_index'])->name('client.deleted');
    Route::get('/client/restore/{client}',[ClientController::class,'restore'])->name('client.restore');
    Route::get('/client/search', [ClientController::class, 'search_client'])->name('client.search');
    Route::resource('client', ClientController::class);

});




Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/payment/client/{client}/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::get('/payment/{payment}/edit', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::patch('/payment/{payment}/update', [PaymentController::class, 'update'])->name('payment.update');
    Route::post('/payment/client/{client}', [PaymentController::class, 'store'])->name('payment.store');
    Route::post('/payment/client/{client}/show', [PaymentController::class, 'show'])->name('payments.show');
});
// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

require __DIR__ . '/auth.php';
