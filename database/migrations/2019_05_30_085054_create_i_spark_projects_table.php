<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateISparkProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_spark_projects', function (Blueprint $table) {
            // $table->bigIncrements('id')->nullable();
            // $table->string('project_title')->nullable();
            // $table->text('problem_statement')->nullable();
            // $table->text('proposed_solution')->nullable();
            // $table->text('target_market')->nullable();
            // $table->unsignedTinyInteger('category_id')->nullable();
            // $table->foreign('category_id')->references('id')->on('project_categories');
            // $table->unsignedBigInteger('team_leader')->nullable();
            // $table->foreign('team_leader')->references('id')->on('project_members');
            // $table->timestamps();
            $table->bigIncrements('id');
            $table->string('project_title')->nullable();
            $table->text('problem_statement')->nullable();
            $table->text('product_solution')->nullable();
            $table->text('target_market')->nullable();
            $table->unsignedTinyInteger('category_id')->nullable();
            $table->unsignedBigInteger('team_leader')->nullable();
            $table->string('project_code')->nullable();
            $table->string('password')->nullable();

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
        Schema::dropIfExists('i_spark_projects');
    }
}
