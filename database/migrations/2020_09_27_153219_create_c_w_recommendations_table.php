<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCWRecommendationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_w_recommendations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type');
            $table->unsignedBigInteger('recommended_by');
            $table->tinyInteger('recommendation')->nullable();
            $table->string('comments')->nullable();
            $table->string('cw_space_id');
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
        Schema::dropIfExists('c_w_recommendations');
    }
}
