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

Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/contact', 'PagesController@contact');

Route::get('admin', function () {
    return view('admin_template', [
        'page_title' => 'title',
        'page_description' => 'description',
    ]);
});

Route::get('test', 'TestController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/weathers', 'WeathersController')->middleware('can:update,weather');
// Route::get('/weathers', 'WeathersController@index');
// Route::get('/weathers/create', 'WeathersController@create');
// Route::get('/weathers/{project}', 'WeathersController@show');
// Route::post('/weathers', 'WeathersController@store');
// Route::get('/weathers/{project}/edit', 'WeathersController@edit');
// Route::patch('/weathers/{project}', 'WeathersController@update');
// Route::delete('/weathers/{project}', 'WeathersController@destroy');

Route::get('/weathers/callapi/{app_id}/{city_id}', 'WeathersController@callapi');

Route::post('/weathers/{weather}/tasks', 'WeatherTasksController@store');
Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');
