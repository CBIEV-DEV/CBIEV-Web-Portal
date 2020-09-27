<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CwSpaceProjectMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_working_project_member', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('cw_application_id');
            $table->foreign('cw_application_id')->references('id')->on('co_working_space_applications');
            $table->unsignedbigInteger('project_member_id');
            $table->foreign('project_member_id')->references('id')->on('c_w_registration_project_member');
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
        Schema::dropIfExists('co_working_project_member');
    }
}
