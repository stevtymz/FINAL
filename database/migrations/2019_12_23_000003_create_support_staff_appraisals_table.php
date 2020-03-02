<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportStaffAppraisalsTable extends Migration
{
    public function up()
    {
        Schema::create('support_staff_appraisals', function (Blueprint $table) {
            $table->increments('id');

            $table->string('criteria1')->nullable()->default('Professional skills');

            $table->string('emp_rating1');

            $table->longText('emp_comment1');

            $table->string('hod_rating1')->nullable();

            $table->longText('hod_comment1')->nullable();

            $table->decimal('average1', 15, 2)->storedAs('(emp_rating1 + hod_rating1)/2');

            $table->string('criteria2')->nullable()->default('Team work');

            $table->string('emp_rating2');

            $table->longText('emp_comment2');

            $table->string('hod_rating2')->nullable();

            $table->longText('hod_comment2')->nullable();

            $table->decimal('average2', 15, 2)->storedAs('(emp_rating2 + hod_rating2)/2');

            $table->string('criteria3')->nullable()->default('Communication');

            $table->string('emp_rating3');

            $table->longText('emp_comment3');

            $table->string('hod_rating3')->nullable();

            $table->longText('hod_comment3')->nullable();

            $table->decimal('average3', 15, 2)->storedAs('(emp_rating3 + hod_rating3)/2');

            $table->string('criteria4')->nullable()->default('Result orientation');

            $table->string('emp_rating4');

            $table->longText('emp_comment4');

            $table->string('hod_rating4')->nullable();

            $table->longText('hod_comment4')->nullable();

            $table->decimal('average4', 15, 2)->storedAs('(emp_rating4 + hod_rating4)/2');

            $table->string('criteria5')->nullable()->default('Equipment & facilities');

            $table->string('emp_rating5');

            $table->longText('emp_comment5');

            $table->string('hod_rating5')->nullable();

            $table->longText('hod_comment5')->nullable();

            $table->decimal('average5', 15, 2)->storedAs('(emp_rating5 + hod_rating5)/2');

            $table->string('criteria6')->nullable()->default('Time management');

            $table->string('emp_rating6');

            $table->longText('emp_comment6');

            $table->string('hod_rating6')->nullable();

            $table->longText('hod_comment6')->nullable();

            $table->decimal('average6', 15, 2)->storedAs('(emp_rating6 + hod_rating6)/2');
        
            $table->string('criteria7')->nullable()->default('Customer care');

            $table->string('emp_rating7');

            $table->longText('emp_comment7');

            $table->string('hod_rating7')->nullable();

            $table->longText('hod_comment7')->nullable();

            $table->decimal('average7', 15, 2)->storedAs('(emp_rating7 + hod_rating7)/2');

            $table->string('criteria8')->nullable()->default('Loyality');

            $table->string('emp_rating8');

            $table->longText('emp_comment8');

            $table->string('hod_rating8')->nullable();

            $table->longText('hod_comment8')->nullable();

            $table->decimal('average8', 15, 2)->storedAs('(emp_rating8 + hod_rating8)/2');

            $table->decimal('percentage', 15, 2)->storedAs('(average1 + average2 + average3 + average4 + average5 + average6 + average7 + average8)/40*100');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
