<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rater_id')->unsigned()->index();
            $table->foreign('rater_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('rated_id')->unsigned()->index();
            $table->foreign('rater_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('profile_id')->unsigned()->index();
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->integer('rated_task_id')->unsigned()->index();
            $table->foreign('rated_task_id')->references('id')->on('assigned_tasks')->onDelete('cascade');
            $table->text('comment')->nullable();
            $table->integer('rating')->nullable();
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
        Schema::dropIfExists('ratings');
    }
}
