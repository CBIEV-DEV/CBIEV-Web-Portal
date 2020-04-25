<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePRDirectorApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pr_director_approvals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('approved_by');
            $table->foreign('approved_by')->references('id')->on('cbiev_staff');
            $table->unsignedTinyInteger('is_recommended')->default(2)->nullable();// 0 = not approve, 1 = approved, 2 = pending, 3 = auto approve
            $table->text('reason')->default(null)->nullable();
            $table->text('comment')->default(null)->nullable();
            $table->unsignedBigInteger('pr_status_tracking_id');
            $table->foreign('pr_status_tracking_id')->references('id')->on('pr_status_trackings');
            $table->timestamp('completed_at')->default(null)->nullable();
            $table->string('url', 700)->nullable();
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
        Schema::dropIfExists('pr_director_approvals');
    }
}
