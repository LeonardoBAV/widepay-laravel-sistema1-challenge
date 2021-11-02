<?php

Route::middleware('auth')->group(function() {

    Route::get('/{tab?}', 'WidePayLaravelSistema1ChallengeController@index')->name('home');

    Route::prefix('urls')->group(function() {
        Route::post('/', 'UrlController@store')->name('urls.store');
        Route::put('/', 'UrlController@update')->name('urls.update');
        Route::delete('/', 'UrlController@destroy')->name('urls.destroy');
    });    

});