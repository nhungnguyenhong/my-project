<?php
Route::group(['prefix' => 'api'], function () {
    Route::resource('users', 'UserController');
    Route::post('users/search', 'UserController@search'); 
});
Route::view('/{any}', 'welcome')
    ->where('any', '.*');
