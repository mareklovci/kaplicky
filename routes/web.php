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

Route::get('/', 'PagesController@index');

Route::get('/artefact', 'ArtefactController@default');
Route::get('/artefact/{id}', 'ArtefactController@view');
Route::get('/artefact/like/{id}', 'ArtefactController@like');
Route::get('/artefact/unlike/{id}', 'ArtefactController@unlike');
Route::get('/category/{id}', 'ArtefactController@showCategory');
Route::get('/detail/like/{id}', 'DetailsController@like');
Route::get('/detail/unlike/{id}', 'DetailsController@unlike');
Route::resource('/detail', 'DetailsController', array('only' => array('index', 'show')));
Route::resource('/categories', 'CategoriesController', array('only' => array('index')));
Route::resource('/favartefacts', 'FavoriteArtefactsController', array('only' => array('index', 'show', 'store')));
Route::resource('/charts', 'ChartsController', array('only' => array('index', 'show', 'store')));
Route::get('/favmetadata', 'FavoriteMetadataController@index');
Route::get('/favmetadata/unlike/{id}', 'FavoriteMetadataController@unlike');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
