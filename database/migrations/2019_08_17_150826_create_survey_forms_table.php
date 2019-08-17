<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('org_name');
            $table->string('owner_name');
            $table->string('present_address');
            $table->string('permanent_address');
            $table->string('cell_no');
            $table->string('concern_person');
            $table->string('org_cell_no');
            $table->string('bussiness_type');
            $table->string('bussiness_year');
            $table->string('one');
            $table->string('two_data');
            $table->string('two_extra')->nullable();
            $table->string('three');
            $table->string('four_data');
            $table->string('four_extra')->nullable();
            $table->string('five');
            $table->string('six_data');
            $table->string('six_extra')->nullable();
            $table->string('seven');
            $table->string('eight');
            $table->string('nine');
            $table->string('ten_data');
            $table->string('ten_extra')->nullable();
            $table->string('eleven');
            $table->string('twelve_data');
            $table->string('twelve_extra')->nullable();
            $table->string('thirteen_data');
            $table->string('thirteen_extra')->nullable();
            $table->string('forteen_data');
            $table->string('forteen_extra')->nullable();
            $table->string('fifteen');
            $table->string('sixteen_data');
            $table->string('sixteen_extra')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_forms');
    }
}
