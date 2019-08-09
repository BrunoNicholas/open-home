<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->nullable()->unsigned();
            $table->integer('project_id')->nullable()->unsigned();
            
            $table->string('topic')->nullable()->default('No title!');
            $table->text('description');
            $table->integer('asked_by')->unsigned();
            $table->integer('responder')->nullable()->unsigned();
            $table->text('response')->nullable();
            $table->string('status')->default('Pending')->nullable();
            $table->timestamps();

            $table->foreign('responder')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
