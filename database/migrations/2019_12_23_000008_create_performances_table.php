<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformancesTable extends Migration
{
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('qualifications');

            $table->string('refereed_journal');

            $table->string('other_publications');

            $table->string('teaching_experience');

            $table->string('research_grants');

            $table->string('supervision');

            $table->string('other_activities');

            $table->string('community_service');

            $table->string('criteria1')->nullable()->default('Professional skills');

            $table->string('emp_rating1');

            $table->longText('emp_comment1');

            $table->string('hod_rating1')->nullable();

            $table->longText('hod_comment1')->nullable();

            $table->decimal('average1', 15, 2)->storedAs('(emp_rating1 + hod_rating1)/2');

            $table->string('criteria2')->nullable()->default('Leadership');

            $table->string('emp_rating2');

            $table->longText('emp_comment2');

            $table->string('hod_rating2')->nullable();

            $table->longText('hod_comment2')->nullable();

            $table->decimal('average2', 15, 2)->storedAs('(emp_rating2 + hod_rating2)/2');

            $table->string('criteria3')->nullable()->default('Decision making');

            $table->string('emp_rating3');

            $table->longText('emp_comment3');

            $table->string('hod_rating3')->nullable();

            $table->longText('hod_comment3')->nullable();

            $table->decimal('average3', 15, 2)->storedAs('(emp_rating3 + hod_rating3)/2');

            $table->string('criteria4')->nullable()->default('Initiative & Innovation');

            $table->string('emp_rating4');

            $table->longText('emp_comment4');

            $table->string('hod_rating4')->nullable();

            $table->longText('hod_comment4')->nullable();

            $table->decimal('average4', 15, 2)->storedAs('(emp_rating4 + hod_rating4)/2');

            $table->string('criteria5')->nullable()->default('Team work');

            $table->string('emp_rating5');

            $table->longText('emp_comment5');

            $table->string('hod_rating5')->nullable();

            $table->longText('hod_comment5')->nullable();

            $table->decimal('average5', 15, 2)->storedAs('(emp_rating5 + hod_rating5)/2');

            $table->string('criteria6')->nullable()->default('Human resource/mentorship');

            $table->string('emp_rating6');

            $table->longText('emp_comment6');

            $table->string('hod_rating6')->nullable();

            $table->longText('hod_comment6')->nullable();

            $table->decimal('average6', 15, 2)->storedAs('(emp_rating6 + hod_rating6)/2');
        
            $table->string('criteria7')->nullable()->default('Financial management');

            $table->string('emp_rating7');

            $table->longText('emp_comment7');

            $table->string('hod_rating7')->nullable();

            $table->longText('hod_comment7')->nullable();

            $table->decimal('average7', 15, 2)->storedAs('(emp_rating7 + hod_rating7)/2');

            $table->string('criteria8')->nullable()->default('Equipment & facilities');

            $table->string('emp_rating8');

            $table->longText('emp_comment8');

            $table->string('hod_rating8')->nullable();

            $table->longText('hod_comment8')->nullable();

            $table->decimal('average8', 15, 2)->storedAs('(emp_rating8 + hod_rating8)/2');

            $table->string('criteria9')->nullable()->default('Result orientation');

            $table->string('emp_rating9');

            $table->longText('emp_comment9');

            $table->string('hod_rating9')->nullable();

            $table->longText('hod_comment9')->nullable();

            $table->decimal('average9', 15, 2)->storedAs('(emp_rating9 + hod_rating9)/2');

            $table->string('criteria10')->nullable()->default('Customer/client care');

            $table->string('emp_rating10');

            $table->longText('emp_comment10');

            $table->string('hod_rating10')->nullable();

            $table->longText('hod_comment10')->nullable();

            $table->decimal('average10', 15, 2)->storedAs('(emp_rating10 + hod_rating10)/2');

            $table->string('criteria11')->nullable()->default('Communication');

            $table->string('emp_rating11');

            $table->longText('emp_comment11');

            $table->string('hod_rating11')->nullable();

            $table->longText('hod_comment11')->nullable();

            $table->decimal('average11', 15, 2)->storedAs('(emp_rating11 + hod_rating11)/2');

            $table->string('criteria12')->nullable()->default('Integrity');

            $table->string('emp_rating12');

            $table->longText('emp_comment12');

            $table->string('hod_rating12')->nullable();

            $table->longText('hod_comment12')->nullable();

            $table->decimal('average12', 15, 2)->storedAs('(emp_rating12 + hod_rating12)/2');

            $table->string('criteria13')->nullable()->default('Time management');

            $table->string('emp_rating13');

            $table->longText('emp_comment13');

            $table->string('hod_rating13')->nullable();

            $table->longText('hod_comment13')->nullable();

            $table->decimal('average13', 15, 2)->storedAs('(emp_rating13 + hod_rating13)/2');

            $table->string('criteria14')->nullable()->default('Loyality');

            $table->string('emp_rating14');

            $table->longText('emp_comment14');

            $table->string('hod_rating14')->nullable();

            $table->longText('hod_comment14')->nullable();

            $table->decimal('average14', 15, 2)->storedAs('(emp_rating14 + hod_rating14)/2');

            $table->string('criteria15')->nullable()->default('Planning,organizing and coordinating');

            $table->string('emp_rating15');

            $table->longText('emp_comment15');

            $table->string('hod_rating15')->nullable();

            $table->longText('hod_comment15')->nullable();

            $table->decimal('average15', 15, 2)->storedAs('(emp_rating15 + hod_rating15)/2');

            $table->decimal('percentage', 15, 2)->storedAs('(qualifications + refereed_journal + other_publications + teaching_experience + research_grants + supervision + other_activities + community_service + average1 + average2 + average3 + average4 + average5 + average6 + average7 + average8 + average9 + average10 + average11 + average12 + average13 + average14 + average15)/251*100');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
