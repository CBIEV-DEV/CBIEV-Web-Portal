<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoWorkingSpaceApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_working_space_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('project_type');
            $table->string('project_title');
            $table->string('project_description');
            $table->string('start_duration');
            $table->string('end_duration');
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
        Schema::dropIfExists('co_working_space_applications');
    }
}
