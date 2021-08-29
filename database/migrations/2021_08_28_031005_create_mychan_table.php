<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMychanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mychans', function (Blueprint $table) {
            $table->id();
            $table->string('remarkID')->unique();
            $table->string('user', 30);
            $table->string('title', 30)->nullable();
            $table->text('content');
            $table->string('email')->nullable();
            /* Pertenece a un post */
            $table->string('goto')->nullable();

            $table->ipAddress('visitor');
            $table->ipAddress('ban')->nullable();
            $table->string('password', 255)->nullable();
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
        Schema::dropIfExists('mychans');
    }
}
