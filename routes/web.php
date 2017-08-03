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
    $schools = \App\Skola::all();
    return view('welcome', ['schools' => $schools, 'noLayout' => 1]);
});

Auth::routes();

/** Home */
Route::get('/domov', 'HomeController@index');

/** Schools */
Route::get('/skoly', 'SchoolsController@index');
Route::get('/skoly/{skola}', 'SchoolsController@show');

/** Comments */
Route::post('/komentare', 'CommentsController@store');

/** Search */
Route::get('/hledat', 'SearchController@index');

/** Register */
Route::get('/registrace', 'Auth\RegisterController@index');
