<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');

            $table->string('job_title');

            $table->string('salary_scale')->unique();

            $table->decimal('ammount', 15, 2);

            $table->date('year');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
