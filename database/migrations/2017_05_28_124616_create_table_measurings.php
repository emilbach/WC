<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMeasurings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurings', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('folder_no');
            $table->string('measuring_tool');
            $table->string('size');
            $table->bigInteger('register_no');
            $table->bigInteger('old_no');
            $table->integer('stamp_no');
            $table->integer('box_no');
            $table->bigInteger('manhole_no');
            $table->float('current_measure');
            $table->date('installing_date');
            $table->string('notes');
            $table->string('email', 250);
            $table->foreign('email')->references('email')->on('users');
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
        Schema::dropIfExists('measurings');
    }
}
