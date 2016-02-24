<?php

Route::group(['middleware' => ['web']], function () {

    Route::group(['prefix' => 'admin', 'namespace' => 'NineCells\Admin\Http\Controllers'], function() {

        Route::get('/', 'AdminController@GET_index');
    });
});
