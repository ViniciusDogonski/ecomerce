<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestController;

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

// Route::get('/', function () {
//     return view('welcome', [ProductController::class, 'index']);
// });

Route::get('/', [ProductController::class, 'getAll']);

Route::get('/ADM', function () {
    return view('test');
});

Route::get('/produtos', function () {
    return view('produtos');
});

// Route::get('/produtos/{id}', function ($id) {
//     return view('produto', ['id'=>$id]);
// });

// Route::get('/produtos/criar', function () {
//     return view('produtoCadastro');
// })->middleware('auth');

Route::post('/produtos', [ProductController::class, 'store'])->middleware('auth');
Route::post('/produtos/{id}', [ProductController::class, 'destroy'])->middleware('auth');

Route::post('/buy', [RequestController::class, 'store'])->middleware('auth');

Route::get('/redirects', [HomeController::class, 'index']);

Route::get('/user', [RequestController::class, 'findRequestsByUserId'])->middleware('auth');

Route::get('/produtos/{id}', [ProductController::class, 'getById']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
