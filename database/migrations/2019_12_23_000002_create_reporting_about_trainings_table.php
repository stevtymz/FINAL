<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportingAboutTrainingsTable extends Migration
{
    public function up()
    {
        Schema::create('reporting_about_trainings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('training');

            $table->string('venue');

            $table->date('date');

            $table->longText('employee_feedback');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
