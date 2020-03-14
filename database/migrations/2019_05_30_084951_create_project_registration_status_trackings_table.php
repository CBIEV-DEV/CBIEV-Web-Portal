<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectRegistrationStatusTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pr_status_trackings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_registration_id');
            $table->foreign('project_registration_id')->references('id')->on('project_registrations');
            $table->unsignedTinyInteger('project_registration_status');
            $table->timestamps();
            /**
             * 0 = submited
             * 1 = supervisor recommendation
             * 2 = dean/head recommendation
             * 3 = manager recommendation
             * 4 = director approval
             * 5 = approved
             * 6 = rejected
             * 7 = supervisor recommendation rerun
             * 8 = dean/head recommendation rerun
             * 9 = manager recommendation rerun
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pr_status_trackings');
    }
}

