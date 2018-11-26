<?php 

// These routes will require no pre-authentication

//Route::get('users', 'Auth/UsersController@index');
Route::get('access', 'AccessController@index');
Route::resource('devices', 'DeviceController');
Route::get('device-owner-username/{id}', 'DeviceController@deviceOwnerUsername');
Route::get('all-devices', 'DeviceController@allDevices');
Route::get('device-nodes', 'DeviceNodeController@index');
Route::get('measurements', 'MeasurementController@index');
Route::get('measurement-types', 'MeasurementTypeController@index');
Route::get('device-types', 'DeviceTypeController@index');
Route::get('events', 'EventController@index');
Route::get('event-types', 'EventTypeController@index');
Route::get('event-logs', 'EventLogController@index');
Route::get('images', 'ImageController@index');



Route::group(['namespace'=> 'Auth'], function() {
    Route::post('register', 'RegisterController@register');
    Route::post('user-login', 'LoginController@userLogin');
    Route::post('refresh', 'LoginController@refresh');
    Route::resource('users', 'UsersController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('role', 'RoleController');
});




Route::group(['middleware'=> 'jwt.auth'], function() {
    // Current User
//    Route::get('currentuser', 'UsersController@getCurrentUser');

    // Images
    Route::resource('images', 'ImageController');

    // Route::resource('users', 'UsersController');
    // Route::resource('access', 'AccessController');
    // Route::resource('devices', 'DeviceController');
    // Route::resource('device_nodes', 'DeviceNodeController');
    // Route::resource('measurements', 'MeasurementController');
    // Route::resource('measurement_types', 'MeasurementTypeController');
    // Route::resource('device_types', 'DeviceTypeController');
    // Route::resource('events', 'EventController');
    // Route::resource('event_types', 'EventTypeController');
    // Route::resource('event_logs', 'EventLogController');
    // Route::resource('images', 'ImageController');
});

