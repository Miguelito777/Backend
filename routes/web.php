<?php

Route::get('/', function () {
    return view('welcome');
});

/* Prefijo para rutas de la API */
Route::prefix('api')->group(function () {
    Route::resource('categorias','CategoriaController'); /*CRUD de categorias para los atletas */
    Route::resource('atletas','AtletasController');
    Route::get('AtletasTotal','EstadisticasController@Total_Atletas');
    Route::get('AtletasCategoria','EstadisticasController@Atletas_by_Categoria');
    Route::get('AtletasGenero', 'EstadisticasController@Atletas_by_Genero');
    Route::get('AtletasRama', 'EstadisticasController@Atletas_by_Rama');
    //Route::get('categorias', array('middleware' => 'cors' => 'CategoriaController' ) );
});
