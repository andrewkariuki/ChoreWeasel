<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
 *
 * ChoreWeasel Authentication Routes
 *
 */
Route::group(['prefix' => 'account', 'middleware' => ['guest']], function () {
    // Choose account
    Route::view('/choose', 'auth.accounts');

    //Register clients
    Route::get('/client', 'Auth\RegisterClientController@clientRegistrationForm');
    Route::post('/client', 'Auth\RegisterClientController@register');

    //Register taskers
    Route::get('/tasker', "Auth\RegisterTaskerController@taskerRegistrationForm");
    Route::post('/tasker', "Auth\RegisterTaskerController@register");

    //Register taskers
    Route::get('/admin', "Auth\RegisterAdminController@adminRegistrationForm");
    Route::post('/admin', "Auth\RegisterAdminController@register");
});
/**
 *
 * End of ChoreWeasel Authentication Routes.
 *
 */

////////////////////////////////////////////////////////////////////////////////////////////

/**
 *
 * ChoreWeasel Tasker Routes - Authenticated
 *
 */
Route::group(['prefix' => 'tasker', 'middleware' => ['auth' => 'role:tasker']], function () {

    //creating taker profile
    Route::get('/{username}/createprofile', [
        'as' => '{username}',
        'uses' => 'ProfileController@createTaskerProfilePage',
    ]);

    Route::put('/{username}/createprofile', [
        'as' => '{username}',
        'uses' => 'ProfileController@update',
    ]);

    Route::get('/{username}/profile/addcategory', [
        'as' => '{username}',
        'uses' => 'ProfileController@showAvailableTaskCategories',
    ]);

    Route::put('/{username}/profile/addcategory', [
        'as' => '{username}',
        'uses' => 'ProfileController@updateTaskCategory',
    ]);

    //summary page on dashboard
    Route::get('/{username}/summary', [
        'as' => '{username}',
        'uses' => 'AllTaskController@taskerSummaryDashboard',
    ]);

    Route::put('/{username}/complete/{assigned_task_id}', 'AssignedTaskController@completeATask');

    //activity page on dashboard
    Route::get('/{username}/activity', [
        'as' => '{username}',
        'uses' => 'AllTaskController@taskerActivityDashboard',
    ]);

    // Show users account settings - viewable by other users.
    Route::get('/{username}/account', [
        'as' => '{username}',
        'uses' => 'ProfileController@showUserAccount',
    ]);

    // Show users profile settings - viewable by only this user.
    Route::get('/{username}/profile', [
        'as' => '{username}',
        'uses' => 'ProfileController@showUserProfile',
    ]);

    Route::get('/upload', 'ProfileController@uploadAvatar');
    Route::put('/upload', 'ProfileController@upload');

    // // Show users wallet - viewable by only this user.
    // Route::get('/{username}/wallet', [
    //     'as'   => '{username}',
    //     'uses' => 'WalletController@showUserWallet',
    // ]);
});

/**
 *
 * End of ChoreWeasel Tasker Routes - Authenticated
 *
 */
//////////////////////////////////////////////////////////////////////////////////////////////////

/**
 *
 * Start of ChoreWeasel Client Routes
 *
 */

Route::group(['prefix' => 'client', 'middleware' => ['auth' => 'role:client']], function () {

    //Create Client profile route
    Route::get('/{username}/createprofile', [
        'as' => '{username}',
        'uses' => 'ProfileController@createClientProfilePage',
    ]);

    Route::put('/{username}/createprofile', [
        'as' => '{username}',
        'uses' => 'ProfileController@updateClientProfile',
    ]);

    //summary page on dashboard
    Route::get('/{username}/summary', [
        'as' => '{username}',
        'uses' => 'AllTaskController@clientSummaryDashboard',
    ]);

    //activity page on dashboard
    Route::get('/{username}/activity', [
        'as' => '{username}',
        'uses' => 'AllTaskController@clientActivityDashboard',
    ]);

    //explore all the available tasks
    Route::get('/explore/allservices', 'AssignedTaskController@index');

    //after exploring now you can start assigning tasks
    Route::get('/assign/{task_category_id}', 'AssignedTaskController@taskdescription');
    Route::post('/assign/{task_category_id}/to', 'AssignedTaskController@sheduleTaskAndTasker');
    Route::post('/assign/{task_category_id}/to/{assigned_to}', 'AssignedTaskController@assignTask');

    // Show users account settings - viewable by other users.
    Route::get('/{username}/account', [
        'as' => '{username}',
        'uses' => 'ProfileController@showUserAccount',
    ]);

    Route::delete('/account/delete/{id}', [
        'as' => '{id}',
        'uses' => 'ProfileController@eleteUserAccount',
    ]);

    Route::get('/{username}/explore', [
        'as' => '{username}',
        'uses' => 'AssignTaskController@explore',
    ]);

    Route::get('/{username}/rate/{assigned_to}/on/{assigned_task_id}', 'RatingController@index');
    Route::post('/{username}/rate/{assigned_to}/on/{assigned_task_id}', 'RatingController@store');

    // Show users profile settings - viewable by only this user.
    // Route::get('/{username}/profile', [
    //     'as'   => '{username}',
    //     'uses' => 'ProfileController@showUserProfile',
    // ]);
});

/**
 *
 * End of ChoreWeasek Client Routes
 *
 */
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 *
 * Start of ChoreWeasel Admin Routes - Authenticated
 *
 */

Route::group(['prefix' => 'admin', 'middleware' => ['auth' => 'role:admin']], function () {
    Route::get('/', 'AdminController@index');

    Route::get('/taskcategories', 'TaskCategoryController@index');
    Route::post('/taskcategories/addtaskcategory', 'TaskCategoryController@store');
    Route::post('/taskcategories/addtaskcategorygroup', 'TaskCategoryGroupController@store');

    Route::view('/taskcategories/availablecategories', 'admin.availablecategories', [
        'categories' => ChoreWeasel\Models\TaskCategory::All(),
    ]);

    //Routes for manipulating the Taskers
    Route::get('/taskers', 'UserManagmentController@taskers');
    Route::get('/tasker/{username}', [
        'as' => '{username}',
        'uses' => 'UserManagmentController@userview',
    ]);

    //Routes for manipulating the Clients
    Route::get('/clients', 'UserManagmentController@clients');

    Route::get('/admins', 'UserManagmentController@admins');

    Route::get('/upload', 'ProfileController@uploadAvatar');
    Route::post('/upload', 'ProfileController@upload');


    //add new administraters... however they will not be super admins
    Route::get('/addadmins', 'AdminController@create');
    Route::post('/addadmins/add', 'AdminController@store');

    // Show users account settings - viewable by other users.
    Route::get('/{username}/account', [
        'as' => '{username}',
        'uses' => 'ProfileController@showUserAccount',
    ]);

    //admin logout
    Route::get('/logout', function () {
        Auth::logout();
        return Redirect::to('login');
    });
});

/**
 *
 * End of ChoreWeasel Admin Routes - Authenticated
 *
 */
////////////////////////////////////////////////////////////////////////////////////////////////////
