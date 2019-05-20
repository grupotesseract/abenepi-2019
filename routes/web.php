<?php

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
    return view('pages.home');
})->name('home');

Route::get('/palestrantes', function () {
    return view('pages.palestrantes');
});

Auth::routes();

Route::get('/admin', 'AdminController@index');

Route::resource('inscritos', 'InscritoController');

Route::resource('inscritos', 'InscritoController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('inscricao', 'InscritoController@inscricao');
Route::post('emissaoPagamento', 'InscritoController@emissaoPagamento');
Route::post('downloadCertificado', 'InscritoController@downloadCertificado');

Route::get('/atualizapago/{idInscrito}', 'InscritoController@atualizaPagou')->name('inscritos.pagou');
Route::get('/atualizacompareceu/{idInscrito}', 'InscritoController@atualizaCompareceu')->name('inscritos.compareceu');
Route::get('downloadcomprovante/{id}', 'InscritoController@downloadComprovante')->name('inscritos.comprovante');

Route::post('/pagseguro/notification', [
    'uses' => '\laravel\pagseguro\Platform\Laravel5\NotificationController@notification',
    'as' => 'pagseguro.notification',
]);