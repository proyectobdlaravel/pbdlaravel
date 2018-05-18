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

Route::get('/inicio', 'PagesController@inicio');
Route::get('/tablon', 'PagesController@tablon');
Route::get('/perfil', 'PagesController@perfil');

Route::get('/mis_anuncios', 'AnunciosController@indexMisAnuncios');
Route::get('/crear_anuncio', 'AnunciosController@indexCrearAnuncios');
Route::get('/modificar_anuncio/{id_anuncio}', 'AnunciosController@indexModificarAnuncios');
Route::post('/anuncio_creado', 'AnunciosController@store');
Route::put('/anuncio_modificado/{id_anuncio}', 'AnunciosController@edit');
Route::delete('/anuncio_borrado/{id_anuncio}', 'AnunciosController@destroy');

Auth::routes();
Route::get('/', 'HomeController@index')->name('inicio');

Route::post('/email_enviado/{titulo}/{email_destinatario}','EmailController@send');
