<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('uid');
            $table->foreign('uid')->references('id')->on('users')->onDelete('cascade');
            $table->string('brand');
            $table->string('model');
            $table->integer('km');
            $table->integer('seat');
            $table->integer('luggage');
            $table->string('gear');
            $table->integer('year');
            $table->string('city');
            $table->string('fuel');
            $table->string('price');
            $table->string('car_image');
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
        Schema::dropIfExists('cars');
    }
}
