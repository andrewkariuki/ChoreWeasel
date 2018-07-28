<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisputesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disputes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('raised_by')->unsigned()->index();
            $table->foreign('raised_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('assigned_task_id')->unsigned()->index();
            $table->foreign('assigned_task_id')->references('id')->on('assigned_tasks')->onDelete('cascade');
            $table->string('subject')->nullable();
            $table->text('complaint')->nullable();
            $table->boolean('solved')->default(0);
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
        Schema::dropIfExists('disputes');
    }
}
