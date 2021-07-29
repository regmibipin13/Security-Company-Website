<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Settings
    Route::post('settings/media', 'SettingsApiController@storeMedia')->name('settings.storeMedia');
    Route::apiResource('settings', 'SettingsApiController');
});

