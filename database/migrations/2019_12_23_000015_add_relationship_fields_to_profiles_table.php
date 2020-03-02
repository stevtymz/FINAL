<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->unsignedInteger('salary_scale_id');

            $table->foreign('salary_scale_id', 'salary_scale_fk_727582')->references('id')->on('salaries');

            $table->unsignedInteger('head_of_department_id')->nullable();

            $table->foreign('head_of_department_id', 'head_of_department_fk_774464')->references('id')->on('users');
        });
    }
}
