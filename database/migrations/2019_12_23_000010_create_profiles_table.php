<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');

            $table->text('first_name');

            $table->text('last_name');

            $table->text('date_of_birth');

            $table->string('current_education');

            $table->string('current_job_title');

            $table->string('avator')->default('default.jpg');

            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
