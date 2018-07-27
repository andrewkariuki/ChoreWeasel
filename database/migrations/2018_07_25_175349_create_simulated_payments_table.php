<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimulatedPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulated_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('payer_id')->unsigned()->index();
            $table->foreign('payer_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('paid_id')->unsigned()->index();
            $table->foreign('paid_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('paid_task_id')->unsigned()->index();
            $table->foreign('paid_task_id')->references('id')->on('assigned_tasks')->onDelete('cascade');
            $table->string('type')->nullable();
            $table->double('amount_paid')->nullable();
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
        Schema::dropIfExists('simulated_payments');
    }
}
