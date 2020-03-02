<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRewardsTable extends Migration
{
    public function up()
    {
        Schema::table('rewards', function (Blueprint $table) {
            $table->unsignedInteger('employee_name_id');

            $table->foreign('employee_name_id', 'employee_name_fk_774633')->references('id')->on('users');
        });
    }
}
