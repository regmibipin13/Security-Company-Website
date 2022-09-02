<?php

use App\Models\Setting;
use App\Models\Team;

Route::get('/certificates/{qrCode}', function ($qrCode) {
    return redirect()->to(\App\Models\Certificate::with(['media'])->where('qr_code', $qrCode)->first()->certificate->getUrl());
});

Route::get('/employees/certificate/{team}', function ($id) {
    $settings = Setting::first()->load(['media']);
    $team = Team::find($id)->load(['media']);
    $data = [
        'settings' => $settings,
        'team' => $team
    ];
    return view('admin.ec', $data);
});
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }
    return redirect()->route('admin.home');
});
Route::get('/employee_login', 'Auth\LoginController@showEmployeeLoginForm')->name('showEmployeeLoginForm')->middleware('guest');
Route::post('/employee_login', 'Auth\LoginController@employeeLogin')->name('employee_login');
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
    Route::get('/teams/certificate/{team}', 'TeamsController@certificate')->name('teams.certificate');
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
    // Route::delete('qr-generates/destroy', 'QrGenerateController@massDestroy')->name('qr-generates.massDestroy');
    // Route::resource('qr-generates', 'QrGenerateController');

    // Certificates
    Route::delete('certificates/destroy', 'CertificatesController@massDestroy')->name('certificates.massDestroy');
    Route::post('certificates/media', 'CertificatesController@storeMedia')->name('certificates.storeMedia');
    Route::post('certificates/ckmedia', 'CertificatesController@storeCKEditorImages')->name('certificates.storeCKEditorImages');
    Route::resource('certificates', 'CertificatesController');

    // Employee Form
    Route::delete('employee-forms/destroy', 'EmployeeFormController@massDestroy')->name('employee-forms.massDestroy');
    Route::post('employee-forms/media', 'EmployeeFormController@storeMedia')->name('employee-forms.storeMedia');
    Route::post('employee-forms/ckmedia', 'EmployeeFormController@storeCKEditorImages')->name('employee-forms.storeCKEditorImages');
    Route::resource('employee-forms', 'EmployeeFormController');

    // Company Form
    Route::delete('company-forms/destroy', 'CompanyFormController@massDestroy')->name('company-forms.massDestroy');
    Route::resource('company-forms', 'CompanyFormController');

    // Training Form
    Route::delete('training-forms/destroy', 'TrainingFormController@massDestroy')->name('training-forms.massDestroy');
    Route::post('training-forms/media', 'TrainingFormController@storeMedia')->name('training-forms.storeMedia');
    Route::post('training-forms/ckmedia', 'TrainingFormController@storeCKEditorImages')->name('training-forms.storeCKEditorImages');
    Route::resource('training-forms', 'TrainingFormController');


    Route::post('reports/media', 'EmployeeReportsController@storeMedia')->name('reports.storeMedia');
    Route::post('reports/ckmedia', 'EmployeeReportsController@storeCKEditorImages')->name('reports.storeCKEditorImages');
    Route::delete('reports/destroy', 'EmployeeReportsController@massDestroy')->name('reports.massDestroy');
    Route::resource('reports', 'EmployeeReportsController');


    // Marketing
    Route::delete('marketings/destroy', 'MarketingController@massDestroy')->name('marketings.massDestroy');
    Route::resource('marketings', 'MarketingController');

    // Route::get('/ec', 'HomeController@ec');
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
