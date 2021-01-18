<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/','FrontendController@index')->name('front.home');
Route::get('/student-registration','FrontendController@studentRegistrationForm')->name('student.registration');

Route::post('/student-registration','FrontendController@studentRegistrationSave')->name('student.save');
Route::post('/student-login','StudentLoginController@studentLogin')->name('student.login');


/**
 * Student Panel
 */
Route::group(['prefix' => 'student','middleware'=>'auth'], function () {
    Route::get('/student-panel','FrontendController@studentPanel')->name('student.panel');
});


//// Quiz Start ////
Route::get('/quiz-page','QuestionsController@get_questions')->name('front.quiz');
Route::post('mark/count','QuestionsController@count_marks');
// Route::get('/test-page','QuestionsController@test');
Route::get('/test/{question_id}/{option_id}','QuestionsController@test')->name('test.quiz');
Route::get('/finish-exam','QuestionsController@result')->name('exam.finish');
Route::post('/submit/answer','QuestionsController@submit_answer')->name('submit');
Route::post('/skip','QuestionsController@skip')->name('skip');
//// Quiz End ////


// ['register'=>false]
Auth::routes();

// Route::get('locale/{locale}',function($locale){
//     Session::put('locale',$locale);
//     return redirect()->back();
// });

//// Question Section Start ////
// Route::get('quiz-page', 'QuestionsController@get_questions')->name('questions.index');
//// Question Section Section End ////







Route::get('/home', 'HomeController@index')->name('home');

//User Registration
Route::get('/user-registration','UserRegistrationController@showRegistrationForm')->name('user-registration')->middleware('auth');

Route::post('/user-registration','UserRegistrationController@userSave')->name('user-save')->middleware('auth');

Route::get('/user-list','UserRegistrationController@userList')->name('user-list')->middleware('auth');

Route::get('/status-active/{userId}','UserRegistrationController@statusActive')->name('status-active')->middleware('auth');

Route::get('/status-deactive/{userId}','UserRegistrationController@statusDeactive')->name('status-deactive')->middleware('auth');




//Change Languages
Route::get('lang/change', 'HomeController@change')->name('changeLang');

Route::get('/home/application-settings', 'HomeController@showSettings')->name('showSettings');

Route::get('/home/view-profile', 'HomeController@viewProfile')->name('viewProfile');

Route::post('/home/view-profile', 'HomeController@updateProfile')->name('profileUpdate');

//Change Password
Route::get('/home/password-change-view', 'HomeController@passwordChangeView')->name('passwordChangeView');

Route::post('/home/password-change-view', 'HomeController@passwordUpdate')->name('passwordUpdate');

Route::post('/home/application-settings', 'HomeController@settingsUpdate')->name('settings-update');

//Rules routes

Route::group(['prefix' => 'admin','middleware'=>'auth', 'namespace'=>'Admin'], function () {

    //// Question Section ////
    Route::resource('questions', 'QuestionsController');
    Route::get('/options/create/{id}', 'OptionsController@create')->name('options.create');
    Route::post('/options/{id}', 'OptionsController@store')->name('options.store');
    Route::post('/options/edit/{id}', 'OptionsController@update')->name('options.update');
    Route::post('answer/select', 'OptionsController@answer_select');
    Route::delete('options/{id}', 'OptionsController@destroy')->name('option.destroy');
    // Route::post('/question/details/{id}', 'QuestionsController@question_details')->name('question.details');
    //// Question Section End ////

    Route::resource('examrules', 'RulesController');

    




















        /**
         * @author
         * Yeapes
         * Working various module of Quiz
         */

        //School Start
        Route::resource('school', 'SchoolController');
        //School End

        //Class Start
        Route::resource('class', 'ClassController');
        //Class End

        // School Ways Result List

       Route::get('result','ResultController@index')->name('result');
       Route::post('/school-result', 'ResultController@school_result');


});
