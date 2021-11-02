<?php

Route::middleware('auth')->group(function() {

    Route::get('/{tab?}', 'WidePayLaravelSistema1ChallengeController@index')->name('home');

    Route::prefix('urls')->group(function() {
        Route::get('/{tab}/{url}', 'UrlController@edit')->name('urls.edit')->middleware('can:edit,url');
        Route::post('/', 'UrlController@store')->name('urls.store')->middleware('can:store,Modules\WidePayLaravelSistema1Challenge\Entities\Url');
        Route::put('/{url}', 'UrlController@update')->name('urls.update')->middleware('can:update,url');
        Route::delete('/{url}', 'UrlController@destroy')->name('urls.destroy')->middleware('can:delete,url');
    });    

});