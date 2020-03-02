<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToTimeWorkTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('time_work_types', function (Blueprint $table) {
            $table->unsignedInteger('head_of_department_id')->nullable();
            $table->foreign('head_of_department_id', 'head_of_department_fk_774463')->references('id')->on('users');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('time_work_types', function (Blueprint $table) {
            //
        });
    }
}
