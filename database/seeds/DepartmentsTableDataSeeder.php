<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [ 
            [
                'id'    => 1,
                'title' => 'Information Technology',
            ],
            [
                'id'    => 2,
                'title' => 'Computer Science',
            ],
        ];

        Department::insert($departments);
    }
}
