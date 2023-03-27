<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('phoneno');
            $table->string('email');
            $table->text('facebook')->nullable()->default(NULL);
            $table->text('twitter')->nullable()->default(NULL);
            $table->text('linkedin')->nullable()->default(NULL);
            $table->text('instagram')->nullable()->default(NULL);
            $table->text('github')->nullable()->default(NULL);
            $table->string('logo');
            $table->string('favicon');
            $table->string('address_line1');
            $table->string('address_line2')->nullable()->default(NULL);
            $table->text('aboutus');
            $table->text('map');
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
        Schema::dropIfExists('details');
    }
}
