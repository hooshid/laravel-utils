<?php

use Illuminate\Support\Facades\Route;

Route::prefix('utils')->namespace('Hooshid\Utils\Http\Controllers')->group(function () {
    Route::view('/', 'utils::welcome');
    Route::view('/route-list', 'utils::route-list', ['routes' => Route::getRoutes()]);
    Route::get('/schema-builder', 'SchemaBuilderController@index');
    Route::view('/phpinfo', 'utils::phpinfo');
});
