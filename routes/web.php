<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', App\Http\Livewire\Site::class)->name('site');

Auth::routes();

Route::get('/home', App\Http\Livewire\Home::class)->name('home');

Route::get('/cliente', \App\Http\Livewire\CadastroCliente::class)->name('cliente.create');
Route::post('/cliente', \App\Http\Livewire\CadastroCliente::class)->name('cliente.store');
Route::get('/quem-somos', \App\Http\Livewire\QuemSomos::class)->name('quem-somos');
Route::get('/login', \App\Http\Livewire\Login::class)->name('login');

Route::get('/cliente', \App\Http\Livewire\CadastroCliente::class)->name('cliente.create');

