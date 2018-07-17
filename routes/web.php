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

Auth::routes(); //PACOTE DE ROTAS PARA AUTENTICACAO

Route::view('/', 'index')->middleware('guest');
Route::get('/{url}', function () {
    return view('login');
})->where(['url' => 'login|register']);

//ROTAS PROTEGIDAS POR MIDDLEWARE
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'QuestionnaireController@index')->name('dashboard');
    Route::get('/monitor/{id}', 'MonitorarController@show')->name('monitor');
    Route::resource('/question', 'QuestionController');
    Route::resource('/questionnaire', 'QuestionnaireController');
    Route::get('/question/submit/{id}', 'SubmitController@create')->name('submit.create');
    Route::put('/question/submit/{id}', 'SubmitController@store')->name('submit.store');
});

//ROTAS DE RESPOSTA
Route::get('/answer/{token}', 'AnswerController@create')->name('answer.create');     //CRIAR FORM DE RESPOSTA
Route::post('/answer/{id}', 'AnswerController@store')->name('answer.store');      //INSERE RESPOSTA NO BANCO
Route::put('/answer/{token}', 'AnswerController@conclude')->name('answer.conclude'); //CONCLUI FORM DE RESPOSTAS


//TODO: remover ao final do desenvolvimento essas rotas de página temporária
//Route::get('/{page}', function ($page) {
//    $name = 'temp.' . $page;
//    return view()->exists($name) ? view($name) : back();
//});
