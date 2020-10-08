<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about');
Route::get('/search', 'SearchController@search');

Route::get('/consoles', 'ConsoleController@index');
Route::get('/consoles/{id}', 'ConsoleController@show');

Route::get('/genres', 'GenreController@index');
Route::get('/genres/{id}', 'GenreController@show');

Route::get('/games', 'GameController@index')->name('games');
Route::get('/games/addgame', 'GameController@addgame')->middleware('auth');
Route::post('/games', 'GameController@addgamestore');

Route::get('/games/{id}/comments', 'CommentController@show')->middleware('auth');
Route::post('/games/{id}/comments', 'CommentController@store')->middleware('auth');

Route::post('/games/add', 'GameController@addtoliststore')->middleware('auth'); // button on /games/{id} page to add to list in dropdown
Route::get('/games/{id}', 'GameController@show')->name('specgame');

// Route::get('/games/{id}/addplaytime', 'GameController@addplaytime'); // button on /games/{id} page to add playtime
// Route::post('/games/{id}', 'GameController@storeplaytime'); 

Route::get('/profile/{username}', 'ProfileController@index')->name('profile')->middleware('auth');

Route::get('/{username}/lists', 'ListController@index')->name('lists'); // table form
Route::post('/{username}/lists', 'ListController@createstore');
Route::get('/lists/create', 'ListController@create');
Route::get('/lists/{id}/edit', 'ListController@edit');
Route::get('/lists/{id}/delete', 'ListController@delete');
Route::post('/lists/{id}', 'ListController@editstore');
Route::post('/{username}/lists/delete', 'ListController@destroy');
Route::get('/lists/{id}', 'ListController@show')->name('speclist');

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::get('/register', 'RegistrationController@showRegistrationForm');
Route::post('/register', 'RegistrationController@register');


