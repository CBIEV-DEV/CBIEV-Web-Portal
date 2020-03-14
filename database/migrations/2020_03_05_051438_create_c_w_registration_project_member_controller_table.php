<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCWRegistrationProjectMemberControllerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_w_registration_project_member', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('c_w_resgistration_id');
            $table->unsignedBigInteger('project_member_id');
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
        Schema::dropIfExists('c_w_registration_project_member_controller');
    }
}
