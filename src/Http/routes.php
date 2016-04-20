<?php

Route::group(['middleware' => ['web'], 'namespace' => 'rowlin\productso\Http\Controllers'], function () {
    Route::get('category/{slug?}', 'PrsoCategoryController@show');
});