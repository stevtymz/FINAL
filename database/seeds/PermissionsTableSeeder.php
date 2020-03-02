<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2', 
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'profile_create',
            ],
            [
                'id'    => '18',
                'title' => 'profile_edit',
            ],
            [
                'id'    => '19',
                'title' => 'profile_show',
            ],
            [
                'id'    => '20',
                'title' => 'profile_delete',
            ],
            [
                'id'    => '21',
                'title' => 'profile_access',
            ],
            [
                'id'    => '22',
                'title' => 'salary_create',
            ],
            [
                'id'    => '23',
                'title' => 'salary_edit',
            ],
            [
                'id'    => '24',
                'title' => 'salary_show',
            ],
            [
                'id'    => '25',
                'title' => 'salary_delete',
            ],
            [
                'id'    => '26',
                'title' => 'salary_access',
            ],
            [
                'id'    => '27',
                'title' => 'performance_create',
            ],
            [
                'id'    => '28',
                'title' => 'performance_edit',
            ],
            [
                'id'    => '29',
                'title' => 'performance_show',
            ],
            [
                'id'    => '30',
                'title' => 'performance_delete',
            ],
            [
                'id'    => '31',
                'title' => 'performance_access',
            ],
            [
                'id'    => '32',
                'title' => 'time_management_access',
            ],
            [
                'id'    => '33',
                'title' => 'time_work_type_create',
            ],
            [
                'id'    => '34',
                'title' => 'time_work_type_edit',
            ],
            [
                'id'    => '35',
                'title' => 'time_work_type_show',
            ],
            [
                'id'    => '36',
                'title' => 'time_work_type_delete',
            ],
            [
                'id'    => '37',
                'title' => 'time_work_type_access',
            ],
            [
                'id'    => '38',
                'title' => 'time_project_create',
            ],
            [
                'id'    => '39',
                'title' => 'time_project_edit',
            ],
            [
                'id'    => '40',
                'title' => 'time_project_show',
            ],
            [
                'id'    => '41',
                'title' => 'time_project_delete',
            ],
            [
                'id'    => '42',
                'title' => 'time_project_access',
            ],
            [
                'id'    => '43',
                'title' => 'time_entry_create',
            ],
            [
                'id'    => '44',
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => '45',
                'title' => 'time_entry_show',
            ],
            [
                'id'    => '46',
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => '47',
                'title' => 'time_entry_access',
            ],
            [
                'id'    => '48',
                'title' => 'time_report_create',
            ],
            [
                'id'    => '49',
                'title' => 'time_report_edit',
            ],
            [
                'id'    => '50',
                'title' => 'time_report_show',
            ],
            [
                'id'    => '51',
                'title' => 'time_report_delete',
            ],
            [
                'id'    => '52',
                'title' => 'time_report_access',
            ],
            [
                'id'    => '53',
                'title' => 'training_access',
            ],
            [
                'id'    => '54',
                'title' => 'trainee_create',
            ],
            [
                'id'    => '55',
                'title' => 'trainee_edit',
            ],
            [
                'id'    => '56',
                'title' => 'trainee_show',
            ],
            [
                'id'    => '57',
                'title' => 'trainee_delete',
            ],
            [
                'id'    => '58',
                'title' => 'trainee_access',
            ],
            [
                'id'    => '59',
                'title' => 'support_staff_appraisal_create',
            ],
            [
                'id'    => '60',
                'title' => 'support_staff_appraisal_edit',
            ],
            [
                'id'    => '61',
                'title' => 'support_staff_appraisal_show',
            ],
            [
                'id'    => '62',
                'title' => 'support_staff_appraisal_delete',
            ],
            [
                'id'    => '63',
                'title' => 'support_staff_appraisal_access',
            ],
            [
                'id'    => '64',
                'title' => 'reporting_about_training_create',
            ],
            [
                'id'    => '65',
                'title' => 'reporting_about_training_show',
            ],
            [
                'id'    => '66',
                'title' => 'reporting_about_training_edit',
            ],
            [
                'id'    => '67',
                'title' => 'reporting_about_training_delete',
            ],
            [
                'id'    => '68',
                'title' => 'reporting_about_training_access',
            ],
            [
                'id'    => '69',
                'title' => 'reward_create',
            ],
            [
                'id'    => '70',
                'title' => 'reward_show',
            ],
            [
                'id'    => '71',
                'title' => 'reward_edit',
            ],
            [
                'id'    => '72',
                'title' => 'reward_delete',
            ],
            [
                'id'    => '73',
                'title' => 'reward_access',
            ],

            [
                'id'    => '74',
                'title' => 'Insights_access',
            ],
            [
                'id'    => '75',
                'title' => 'appraisal_time_create',
            ],
            [
                'id'    => '76',
                'title' => 'department_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
