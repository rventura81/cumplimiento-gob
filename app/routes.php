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

//Route::controller('/','HomeController');
Route::controller('/backend/auth','AuthController');

Route::group(array('before' => 'auth'), function()
{
    Route::controller('/backend/usuarios', 'UsuariosController');
    Route::controller('/backend/fuentes', 'FuentesController');
    Route::controller('/backend/compromisos', 'CompromisosController');
    Route::controller('/backend/entidades', 'EntidadesController');
    Route::controller('/backend/buscar', 'BuscarController');
    Route::controller('/backend/reportes', 'ReportesController');
    Route::controller('/backend', 'BackendController');
});