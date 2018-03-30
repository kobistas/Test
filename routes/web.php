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
//
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'PagesController@index');

Route::resource('posts', 'PostsController');
Route::resource('comments', 'CommentsController');



Route::post('/posts/{post}/comments', 'CommentsController@store');

Auth::routes();
Route::resource('users', 'UsersController');
Route::resource('/teams', 'TeamsController');
Route::resource('teamsComments', 'TeamsCommentsController');
Route::resource('/results', 'ResultsController');


Route::get('/profile', 'UsersController@profile');
Route::get('/allresults', 'ResultsController@allresults');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('fb.auth');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
