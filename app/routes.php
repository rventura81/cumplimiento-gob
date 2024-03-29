<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::controller('/backend/auth','AuthController');

Route::group(array('before' => 'auth'), function()
{
    Route::get('/backend/compromisos{extension?}','CompromisosController@getIndex');
    Route::controller('/backend/compromisos', 'CompromisosController');
    Route::controller('/backend/usuarios', 'UsuariosController');
    Route::controller('/backend/fuentes', 'FuentesController');
    Route::controller('/backend/entidades', 'EntidadesController');
    Route::controller('/backend/hitos', 'HitosController');
    Route::controller('/backend/historial', 'HistorialController');
    Route::controller('/backend/uploads', 'UploadsController');
    Route::controller('/backend', 'BackendController');
});

Route::controller('/','HomeController');
Route::controller('/compromisos','CompromisosFrontendController');