<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
Auth::routes(['register' => false]);
// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');


// Admin
$this->get('invitation/{invitation_token}', 'Auth\RegisterController@processInvitation')->name('auth.invitation');

Route::group(['middleware' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['preventbackbutton','auth','check_invitation'] ], function () {
    Route::get('/', 'HomeController@index')->name('home');
    
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Departments
    Route::resource('departments', 'DepartmentsController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::get('user/{id}', 'UsersController@restore')->name('users.restore');
    Route::get('restore', 'UsersController@restoreUser')->name('users.restoreUser');
    Route::resource('users', 'UsersController');

    // Profiles
    Route::delete('profiles/destroy', 'ProfileController@massDestroy')->name('profiles.massDestroy');
    Route::post('profiles/media', 'ProfileController@storeMedia')->name('profiles.storeMedia');
    Route::resource('profiles', 'ProfileController');

    // Salaries
    Route::delete('salaries/destroy', 'SalaryController@massDestroy')->name('salaries.massDestroy');
    Route::resource('salaries', 'SalaryController');

    // Performances
    
    Route::delete('performances/destroy', 'PerformanceController@massDestroy')->name('performances.massDestroy');
    Route::resource('performances', 'PerformanceController');

    // showPerformance graph
    
    Route::delete('performance/destroy', 'ShowPerformanceController@massDestroy')->name('performance.massDestroy');
    Route::resource('performance', 'ShowPerformanceController');
    
    //AppraisalPeriod
    Route::resource('time-entry', 'AppraisalPeriodController');
    
    // Time Work Types
    Route::delete('time-work-types/destroy', 'TimeWorkTypeController@massDestroy')->name('time-work-types.massDestroy');
    Route::resource('time-work-types', 'TimeWorkTypeController');

    // Time Projects
    Route::delete('time-projects/destroy', 'TimeProjectController@massDestroy')->name('time-projects.massDestroy');
    Route::resource('time-projects', 'TimeProjectController');

    // Time Entries
    Route::delete('time-entries/destroy', 'TimeEntryController@massDestroy')->name('time-entries.massDestroy');
    Route::resource('time-entries', 'TimeEntryController');

    // Time Reports
    Route::delete('time-reports/destroy', 'TimeReportController@massDestroy')->name('time-reports.massDestroy');
    Route::resource('time-reports', 'TimeReportController');

    // Trainees
    Route::delete('trainees/destroy', 'TraineeController@massDestroy')->name('trainees.massDestroy');
    Route::resource('trainees', 'TraineeController');
    
    // Reporting About Trainings
    Route::delete('reporting-about-trainings/destroy', 'ReportingAboutTrainingController@massDestroy')->name('reporting-about-trainings.massDestroy');
    Route::resource('reporting-about-trainings', 'ReportingAboutTrainingController');

    // Support Staff Appraisals
    Route::delete('support-staff-appraisals/destroy', 'SupportStaffAppraisalController@massDestroy')->name('support-staff-appraisals.massDestroy');
    Route::resource('support-staff-appraisals', 'SupportStaffAppraisalController');

    // showSupport Staff Appraisal graph
    
     Route::delete('support-staff-appraisal/destroy', 'ShowSupportStaffAppraisalController@massDestroy')->name('support-staff-appraisal.massDestroy');
     Route::resource('support-staff-appraisal', 'ShowSupportStaffAppraisalController');

    // Rewards
    Route::delete('rewards/destroy', 'RewardController@massDestroy')->name('rewards.massDestroy');
    Route::resource('rewards', 'RewardController');

    //Messenger
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');

    //Insights
    Route::resource('insights', 'InsightsController');

    //account activate/deactivate
    Route::get('admin.users.index', 'UserController@index');
    Route::get('changeStatus/{id}', 'UserController@changeStatus');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
