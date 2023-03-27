<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyemployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myemployee', function (Blueprint $table) {
            $table->id();
            $table->string("emp_no");
            $table->string("image");
            $table->string("firstname");
            $table->string("lastname");
            $table->string("email");
            $table->date("dob");
            $table->string("mobileno");
            $table->string("emergencyno");
            $table->enum('gender',['F','M','O'])->default(NULl)->nullable();
            $table->text("address");
            $table->integer("country");
            $table->integer("state");
            $table->integer("city");
            $table->integer("department");
            $table->integer("designation");
            $table->integer("salary");
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
        Schema::dropIfExists('myemployee');
    }
}
