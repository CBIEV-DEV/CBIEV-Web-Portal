<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePRDeanHeadRecommendationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pr_dean_head_recommendations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('recommended_by');
            $table->foreign('recommended_by')->references('id')->on('dean_heads');
            $table->unsignedTinyInteger('is_recommended')->default(2)->nullable();// 0 = not recommended, 1 = recomended, 2 = pending 
            $table->text('reason')->default(null)->nullable();
            $table->text('comment')->default(null)->nullable();
            $table->unsignedBigInteger('pr_status_tracking_id');
            $table->foreign('pr_status_tracking_id')->references('id')->on('pr_status_trackings');
            $table->unsignedTinyInteger('is_completed')->default(0);// 0 = pending, 1 = recomended, 2 = not recommended, 3 = auto approved
            $table->timestamp('completed_at')->default(null)->nullable();
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
        Schema::dropIfExists('pr_dean_head_recommendations');
    }
}
