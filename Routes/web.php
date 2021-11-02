<?php

Route::middleware('auth')->group(function() {

    Route::get('/{tab?}', 'WidePayLaravelSistema1ChallengeController@index')->name('home');

    Route::prefix('urls')->group(function() {
        Route::get('/{tab}/{url}', 'UrlController@edit')->name('urls.edit');
        Route::post('/', 'UrlController@store')->name('urls.store');
        Route::put('/{url}', 'UrlController@update')->name('urls.update');
        Route::delete('/{url}', 'UrlController@destroy')->name('urls.destroy');
    });    

});