<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;
use App\Http\Controllers\AppRoutesController;

Route::middleware('log.acesso')->get('/', 'PrincipalController@principal')
    ->name('site.index');

AppRoutesController::register();

Route::get('/contato', 'ContatoController@contato')
    ->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')
    ->name('site.contato');

Route::get('/register', 'RegisterController@index')->name('site.register');
Route::post('/register', 'RegisterController@salvar')->name('site.register');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');


