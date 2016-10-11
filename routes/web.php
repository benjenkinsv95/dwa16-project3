<?php

use Illuminate\Support\Facades\Route;

/**
 * Foobooks code
 * TODO remove foobooks, this is just p3
 */
Route::resource('books', 'BookController');

/**
 * Main home page
 */
Route::get('/', function () {
    return view('home');
});

Route::get('/password_generator', 'PasswordGeneratorController@index')->name('password_generator.index');
Route::post('/password_generator', 'PasswordGeneratorController@store')->name('password_generator.store');

Route::get('/random_user_generator', 'RandomUserGeneratorController@index')->name('random_user_generator.index');
Route::post('/random_user_generator', 'RandomUserGeneratorController@store')->name('random_user_generator.store');

Route::get('/lorem_ipsum_generator', 'LoremIpsumGeneratorController@index')->name('lorem_ipsum_generator.index');
Route::post('/lorem_ipsum_generator', 'LoremIpsumGeneratorController@store')->name('lorem_ipsum_generator.store');

Route::get('/laravel_comment_formatter', 'LaravelCommentFormatterController@index')->name('laravel_comment_formatter.index');
Route::post('/laravel_comment_formatter', 'LaravelCommentFormatterController@store')->name('laravel_comment_formatter.store');

/**
 * Laravel 5 log viewer from: https://github.com/rap2hpoutre/laravel-log-viewer
 */
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

/**
 * A quick and dirty way to set up a whole bunch of practice routes
 * that I'll use in lecture.
 * From: https://github.com/susanBuck/dwa15-fall2016-notes/blob/master/03_Laravel/99_Practice.md
 */
Route::get('/practice', 'PracticeController@index')->name('practice.index');
for ($i = 0; $i < 100; $i++) {
    Route::get('/practice/' . $i, 'PracticeController@example' . $i)->name('practice.example' . $i);
}