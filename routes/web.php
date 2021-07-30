<?php


Route::get('/certificates/{qrCode}', function($qrCode) {
    return redirect()->to(\App\Models\Certificate::with(['media'])->where('qr_code',$qrCode)->first()->certificate->getUrl());
});
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }
    return redirect()->route('admin.home');
});
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingsController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingsController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::resource('settings', 'SettingsController');

    // Website
    Route::delete('websites/destroy', 'WebsiteController@massDestroy')->name('websites.massDestroy');
    Route::post('websites/media', 'WebsiteController@storeMedia')->name('websites.storeMedia');
    Route::post('websites/ckmedia', 'WebsiteController@storeCKEditorImages')->name('websites.storeCKEditorImages');
    Route::resource('websites', 'WebsiteController');

    // Service
    Route::delete('services/destroy', 'ServiceController@massDestroy')->name('services.massDestroy');
    Route::post('services/media', 'ServiceController@storeMedia')->name('services.storeMedia');
    Route::post('services/ckmedia', 'ServiceController@storeCKEditorImages')->name('services.storeCKEditorImages');
    Route::resource('services', 'ServiceController');

    // Teams
    Route::get('/teams/certificate/{team}','TeamsController@certificate')->name('teams.certificate');
    Route::delete('teams/destroy', 'TeamsController@massDestroy')->name('teams.massDestroy');
    Route::post('teams/media', 'TeamsController@storeMedia')->name('teams.storeMedia');
    Route::post('teams/ckmedia', 'TeamsController@storeCKEditorImages')->name('teams.storeCKEditorImages');
    Route::resource('teams', 'TeamsController');

    // Testimonials
    Route::delete('testimonials/destroy', 'TestimonialsController@massDestroy')->name('testimonials.massDestroy');
    Route::post('testimonials/media', 'TestimonialsController@storeMedia')->name('testimonials.storeMedia');
    Route::post('testimonials/ckmedia', 'TestimonialsController@storeCKEditorImages')->name('testimonials.storeCKEditorImages');
    Route::resource('testimonials', 'TestimonialsController');

    // Gallery Collections
    // Route::delete('gallery-collections/destroy', 'GalleryCollectionsController@massDestroy')->name('gallery-collections.massDestroy');
    // Route::post('gallery-collections/media', 'GalleryCollectionsController@storeMedia')->name('gallery-collections.storeMedia');
    // Route::post('gallery-collections/ckmedia', 'GalleryCollectionsController@storeCKEditorImages')->name('gallery-collections.storeCKEditorImages');
    // Route::resource('gallery-collections', 'GalleryCollectionsController');

    // Qr Generate
    Route::delete('qr-generates/destroy', 'QrGenerateController@massDestroy')->name('qr-generates.massDestroy');
    Route::resource('qr-generates', 'QrGenerateController');

    // Certificates
    Route::delete('certificates/destroy', 'CertificatesController@massDestroy')->name('certificates.massDestroy');
    Route::post('certificates/media', 'CertificatesController@storeMedia')->name('certificates.storeMedia');
    Route::post('certificates/ckmedia', 'CertificatesController@storeCKEditorImages')->name('certificates.storeCKEditorImages');
    Route::resource('certificates', 'CertificatesController');

    Route::get('/ec', 'HomeController@ec');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
