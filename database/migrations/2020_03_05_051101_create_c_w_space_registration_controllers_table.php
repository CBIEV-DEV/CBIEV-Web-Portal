<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCWSpaceRegistrationControllersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_w_space_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category');
            $table->unsignedBigInteger('team_leader');
            $table->string('CWS_ucID')->nullable();
            $table->string('CWS_contact')->nullable();
            $table->string('CWS_email')->nullable();
            $table->string('CWS_faculty')->nullable();
            $table->string('CWS_programme')->nullable();
            $table->string('CWS_IC')->nullable();
            $table->string('project_title')->nullable();
            $table->text('project_description')->nullable();
            $table->dateTime('start_date');
            $table->dateTIme('end_date');
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
        Schema::dropIfExists('c_w_space_registration_controllers');
    }
}
