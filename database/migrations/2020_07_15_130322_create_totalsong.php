<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalsong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('totalsong', function (Blueprint $table) {
            $table->id();
            $table->string('songername');
            $table->string('photo')->unique();
            $table->string('title')->unique();
            $table->string('time');
            $table->string('size');
            $table->string('style');
            $table->string('localsite')->unique();
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
        Schema::dropIfExists('totalsong');
    }
}
