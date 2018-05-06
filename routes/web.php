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
    return view('index');
});

Route::get('/{url}', function () {
    return view('login');
})->where(['url' => 'login|register']);

Auth::routes();

Route::get('/{page}',function ($page) {
    return view($page);
});

Route::resource('/questionnaire','QuestionnaireController');

//Route::get('/home', 'HomeController@index')->name('home');
