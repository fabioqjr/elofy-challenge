<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExemploController;

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

Route::get('/token', function () {
    return csrf_token();
});

Route::get('/', function () {
    return view('welcome');
})->name('helloWorld');

Route::get(
    '/exemplo',
    [ExemploController::class, 'sample']
)->name('exemplo');

// Route::post('/api/criar-exemplo', [ExemploController::class, 'createSample']);
// Route::get('/api/listar-exemplo', [ExemploController::class, 'listSample']);

Route::post('/api/criar-cliente', [ClientController::class, 'createClient']);
Route::get('/api/login-cliente', [ClientController::class, 'loginClient']);

