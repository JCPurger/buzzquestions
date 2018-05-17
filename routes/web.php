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

Auth::routes();

Route::get('/', function () {
    return view('index');
});

Route::get('/{url}', function () {
    return view('login');
})->where(['url' => 'login|register']);


Route::resource('question', 'QuestionController');
Route::resource('questionnaire', 'QuestionnaireController');

//TODO: COLOCAR ESSE MIDDLEWARE AO FINAL DO DESENVOLVIMENTO
//Route::group(['middleware' => ['auth']], function () {
//    Route::resource('question', 'QuestionController');
//    Route::resource('questionnaire', 'QuestionnaireController');
//});


Route::get('/{page}', function ($page) {
    if (view()->exists('temp.'.$page)) {
        return view('temp.'.$page);
    } else {
        return back();
    }
});
