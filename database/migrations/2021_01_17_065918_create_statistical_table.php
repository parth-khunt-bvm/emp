<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistical', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable()->default(NULL);
            $table->string('icon1')->nullable()->default(NULL);
            $table->string('count1')->nullable()->default(NULL);
            $table->string('icon2')->nullable()->default(NULL);
            $table->string('count2')->nullable()->default(NULL);
            $table->string('icon3')->nullable()->default(NULL);
            $table->string('count3')->nullable()->default(NULL);
            $table->string('icon4')->nullable()->default(NULL);
            $table->string('count4')->nullable()->default(NULL);
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
        Schema::dropIfExists('statistical');
    }
}
