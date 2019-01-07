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

Route::get('/', 'HomeController@index') ;

Auth::routes();

/** Home */
Route::get('/domov', 'HomeController@index');


Route::get('/jak-znamkujeme', 'HWGradeController@index');


/** Schools */
Route::get('/skoly', 'SchoolsController@index');
Route::get('/skoly/{skola}', 'SchoolsController@show');

/** Comments */
Route::post('/komentare', 'CommentsController@store');

Route::post('/hodnoceni', ['middleware' => 'auth', 'uses' => 'RatingController@store']);

/** Search */
Route::get('/hledat', 'SearchController@index');

/** Auth */
Route::get('/registrace',[ 'as' => 'registerPage', 'uses' => 'Auth\RegisterController@index']);
Route::get('/odhlaseni',  'Auth\LoginController@logout');

//ajax


/**
 * Artasian komandy
* */
// Vymazat cache fasády
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'vymazáno';
});

// Znovu přegenerovat class loader
Route::get('/optimize', function() {
    Artisan::call('optimize');
});

// Vymazat cache cest
Route::get('/route-cache', function() {
    Artisan::call('route:cache');
});

// Vymazat cache pohledu
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
});

// Vymazat cache configu
Route::get('/config-cache', function() {
    Artisan::call('config:cache');
});

// import fulltextu
Route::get('/scout-import', function() {
    Artisan::call('scout:import "App\Skola"');
});

Route::get('/storage-link', function() {
    Artisan::call('storage:link');
});
