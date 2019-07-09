<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', 'PanelController@index');

/////////////////////////////////
///////////// DECLARANTE
Route::resource('/declarante','DeclaranteController');

/////////////////////////////////
///////////// FILA
Route::delete('/{formato}/{fila_id}','DeclaracionController@borrarfila');

/////////////////////////////////
///////////// DECLARACION
Route::post('/declaracion','DeclaracionController@store');

Route::get('/imprimir/{declaracion_id}/{impresion}', 'DeclaracionController@acuse');

Route::get('/declaracion/{declaracion_id}/edit', 'DeclaracionController@edit');

Route::get('/declaracion/{declaracion_id}/{formato}/{fila?}', 'DeclaracionController@formato');

Route::post('/declaracion/{declaracion_id}/{formato}', 'DeclaracionController@updateformato');

Route::post('/declaracion/{declaracion_id}/{formato}/crear', 'DeclaracionController@createsubformato');

Route::delete('/declaracion/{declaracion_id}/borrar', 'DeclaracionController@borrar');

/////////////////////////////////
///////////// FIRMAR

Route::get('/firmar/{declaracion_id}/condiciones_generales', 'DeclaracionController@condiciones_generales');

Route::get('/firmar/{declaracion_id}/enviar', 'DeclaracionController@firmar');

/////////////////////////////////
///////////// CATALOGO
Route::get('/catalogo/municipios/{estado_id?}', 'CatalogoController@getMunicipios');

Route::get('/catalogo/especifica_tipo/{tipo_inversion_id?}', 'CatalogoController@gettipoinversionespecifica');

Route::get('/catalogo/documentos/{nivel_id?}', 'CatalogoController@getDocumentos');
