<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraineesTable extends Migration
{
    public function up()
    {
        Schema::create('trainees', function (Blueprint $table) {
            $table->increments('id');

            $table->string('programme_name');

            $table->string('venue');

            $table->datetime('time_date');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
