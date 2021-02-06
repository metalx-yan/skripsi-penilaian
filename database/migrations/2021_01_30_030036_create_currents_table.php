<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik');
            $table->string('name');
            $table->integer('soal1');
            $table->integer('soal2');
            $table->integer('soal3');
            $table->integer('soal4');
            $table->string('soal5');
            $table->string('grade');
            $table->integer('tahap');
            $table->string('title');
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
        Schema::dropIfExists('currents');
    }
}
