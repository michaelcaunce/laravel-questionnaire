<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function()
 {
   return view('welcome');
 });
// Route::resource('questionnaires', QuestionnaireController);



Route::get('/questionnaire/new', 'QuestionnaireController@new_questionnaire')->name('new.questionnaire');
Route::get('/questionnaires/{id}', 'QuestionnaireController@questionnaire_details')->name('questionnaire.details');
// Route::get('/questionnaires/{id}', 'QuestionnaireController@questionnaire_answers')->name('questionnaire.answers');
// Route::post('/questionnaires/{id}/', 'QuestionnaireController@store')->name('save.questionnaire');
// Route::post('/questionnaires/store', 'QuestionnaireController@create')->name('create.questionnaire');
// Route::post('/questions/{id}/', 'QuestionController@store')->name('save.question');

Route::get('/admin/users/index/', 'UserController@index')->name('user.details');


Route::group(['middle' => ['web']], function () {

     //
     Route::auth();


     Route::resource('/admin/users', 'UserController' );
     Route::get('/home', 'HomeController@index');
     // Route::get('/questions/create', 'QuestionController@create');
     // Route::resource('/home', 'HomeController');
     // Route::resource('questionnaires', 'HomeController');
     Route::resource('/questionnaires', 'QuestionnaireController');
     Route::resource('/questions', 'QuestionController');
     Route::resource('/options', 'OptionController');
     Route::resource('/answers', 'AnswersController');
     Route::get('/response', 'ResponseController@index');
     Route::resource('/response', 'ResponseController');
     // Route::get('/questionnaire/completed', function(){
     //   return "Completed";
     // });
     Route::resource('/completed', 'CompletedController');


  });
