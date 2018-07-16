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
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'TestController@index')->name('test');

Auth::routes();

Route::get('login/social/{google}', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/social/{facebook}', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');



Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/addPost', 'PostController@index');

    Route::post('/post/add', 'PostController@add')->name('post.add');

    Route::get('/post/delete/{id}','PostController@delete')->name('post.delete');




    Route::middleware(['admin'])->group(function () {

        Route::get('/admin', 'AdminController@index')->name('admin');

        Route::get('/admin/edit/{id}','AdminController@edit');

        Route::get('/admin/delete/{id}','AdminController@delete');

        Route::post('/admin/save','AdminController@save')->name('save.changes');

    });

});









