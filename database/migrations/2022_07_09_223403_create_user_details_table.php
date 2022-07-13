<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('cust_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('contactNo', 10);
            $table->string('email');
            $table->integer('noOfMembers');
            $table->date('deadline');
            $table->boolean('terms_and_conditions');
            $table->string('description');
            $table->string('institute');
            $table->string('module');
            $table->string('er-diagram')->nullable();
            $table->string('functionsDoc')->nullable();
            $table->string('projectDoc')->nullable();
            $table->string('advanced_bank_slip')->nullable();
            $table->string('final_bank_slip')->nullable();
            $table->boolean('status')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('user_details');
    }
};
