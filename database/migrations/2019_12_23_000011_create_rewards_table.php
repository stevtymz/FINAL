<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardsTable extends Migration
{
    public function up()
    {
        Schema::create('rewards', function (Blueprint $table) {
            $table->increments('id');

            $table->longText('reward');

            $table->longText('description');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
