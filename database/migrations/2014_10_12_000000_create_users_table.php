<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            
            $table->string('profile_image')->nullable()->default('profile.jpg');
            $table->string('telephone')->nullable();                                        //
            $table->string('date_of_birth')->nullable();                                           //
            $table->string('maritual_status')->nullable();                                          //
            $table->string('occupation')->nullable();                                    //
            $table->string('location')->default('Bugolobi - Kampala, Uganda')->nullable();
            $table->string('nationality')->nullable();
            $table->string('gender')->nullable();                                           //
            $table->string('bio')->nullable();
            $table->string('role')->nullable()->default('user');  
            $table->string('status')->nullable()->default('Active');
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
        Schema::dropIfExists('users');
    }
}
