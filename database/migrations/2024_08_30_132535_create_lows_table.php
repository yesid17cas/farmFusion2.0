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
        Schema::create('lows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reason_id')->constrained();
            $table->string('user_DocId', 10);
            $table->foreign('user_DocId')->references('DocId')->on('users');
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
        Schema::dropIfExists('lows');
    }
};
