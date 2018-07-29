<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assigned_by')->unsigned()->index();
            $table->foreign('assigned_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('assigned_to')->unsigned()->index();
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade');
            $table->integer('tasker_profile_id')->unsigned()->index();
            $table->foreign('tasker_profile_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->integer('task_category_id')->unsigned();
            $table->foreign('task_category_id')->references('id')->on('task_categories');
            $table->string('city_town')->nullable();
            $table->string('locality_street')->nullable();
            $table->string('apartment_unit')->nullable();
            $table->string('apt_unit_no')->nullable();
            $table->string('task_size')->nullable();
            $table->integer('rates')->nullable();
            $table->text('task_requirements')->nullable();
            $table->text('task_description')->nullable();
            $table->datetime('task_date_time')->nullable();
            $table->datetime('completed_at')->nullable();
            $table->boolean('completed')->default(false);
            $table->double('hours_worked')->nullable();
            $table->decimal('total_payable')->nullable();
            $table->boolean('paid')->default(false);
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
        Schema::dropIfExists('assigned_tasks');
    }
}
