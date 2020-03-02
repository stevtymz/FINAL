<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSupportStaffAppraisalsTable extends Migration
{
    public function up()
    {
        Schema::table('support_staff_appraisals', function (Blueprint $table) {
            $table->unsignedInteger('profile_id');

            $table->foreign('profile_id', 'profile_fk_774606')->references('id')->on('profiles');

            $table->unsignedInteger('head_of_department_id');

            $table->foreign('head_of_department_id', 'head_of_department_fk_774614')->references('id')->on('users');

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
}
