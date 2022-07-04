<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desc_gurus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_id')->constrained();
            $table->string('phone');
            $table->string('education');
            $table->string('experience');
            $table->string('serials');
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
        Schema::dropIfExists('desc_gurus');
    }
}
