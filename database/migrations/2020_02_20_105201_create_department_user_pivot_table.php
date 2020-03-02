<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_727425')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('department_id'); 

            $table->foreign('department_id', 'department_id_fk_727425')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_user_pivot');
    }
}
