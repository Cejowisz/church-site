<?php 

// These routes will require no pre-authentication

//Route::get('users', 'Auth/UsersController@index');
Route::post('contact', 'ContactController@store');
Route::get('galleries', 'GalleryController@index');
Route::post('galleries', 'GalleryController@store');




Route::group(['namespace'=> 'Auth'], function() {
    Route::post('register', 'RegisterController@register');
    Route::post('user-login', 'LoginController@userLogin');
    Route::post('refresh', 'LoginController@refresh');
    Route::resource('users', 'UsersController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('role', 'RoleController');
});


