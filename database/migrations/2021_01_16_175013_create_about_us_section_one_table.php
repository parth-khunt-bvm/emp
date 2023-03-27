<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsSectionOneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_section_one', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default(NULL);
            $table->text('details')->nullable()->default(NULL);
            $table->string('image')->nullable()->default(NULL);
            $table->string('image_headline')->nullable()->default(NULL);
            $table->string('signuture')->nullable()->default(NULL);
            $table->string('contact_no')->nullable()->default(NULL);
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
        Schema::dropIfExists('about_us_section_one');
    }
}
