<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'MoviesController@index')->name('movie.index');
Route::get('/movies/{movies}', 'MoviesController@show')->name('movie.show');


Route::get('/actors', 'ActorsController@index')->name('actor.index');
Route::get('/actors/page/{page?}', 'ActorsController@index');
Route::get('/actors/{actor}', 'ActorsController@show')->name('actor.show');

Route::get('/tvshows', 'TvController@index')->name('tvshow.index');
Route::get('/tvshows/{tvshow}', 'TvController@show')->name('tvshow.show');