<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LanguageMiddleware;



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



Route::middleware([LanguageMiddleware::class])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/enpage',  function(){
        session()->put('locale', 'en');
        return redirect()->route('page');
    })->name('enpage');

    Route::get('/rupage',  function(){
        session()->put('locale', 'ru');
        return redirect()->route('page');
    })->name('rupage');

    /*Route::get('/page', function () {
        return view('page');
    })->name('page');
    */
    Route::post('/page/submit', 'CardController@submit')->name('add-form');
    //Route::get('/page', 'CardController@allData')->name('page');
    
    Route::get('/page/all/{id}/update', 'CardController@updateMes')->name('card-update');
    Route::post('/page/all/{id}/update', 'CardController@updateMesSubmit')->name('card-update-submit');
    
    Route::get('/page/all/{id}/delete', 'CardController@deleteMes')->name('card-delete');
    
    Route::get('/page', 'CardController@selectSome')->name('page');
    
    Route::get('mail/send', 'MailController@send')->name('sendToMail');
    
    Route::get('charts', function(){
        return view('charts');
    });
    
    Route::get('lab12', function(){
        return view('lab12');
    });
    

    
});