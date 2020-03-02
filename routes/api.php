<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Profiles
    Route::post('profiles/media', 'ProfileApiController@storeMedia')->name('profiles.storeMedia');
    Route::apiResource('profiles', 'ProfileApiController');

    // Salaries
    Route::apiResource('salaries', 'SalaryApiController');

    // Performances

    Route::apiResource('performances', 'PerformanceApiController');

    Route::apiresource('graphs', 'ShowPerformanceController');
    // Time Work Types
    Route::apiResource('time-work-types', 'TimeWorkTypeApiController');

    // Time Projects
    Route::apiResource('time-projects', 'TimeProjectApiController');

    // Time Entries
    Route::apiResource('time-entries', 'TimeEntryApiController');

    // Time Reports
    Route::apiResource('time-reports', 'TimeReportApiController');

    // Trainees
    Route::apiResource('trainees', 'TraineeApiController');
    
    // Reporting About Trainings
    Route::apiResource('reporting-about-trainings', 'ReportingAboutTrainingApiController');

    // Rewards
    Route::apiResource('rewards', 'RewardApiController');

    // Support Staff Appraisals
    Route::apiResource('support-staff-appraisals', 'SupportStaffAppraisalApiController');
});
