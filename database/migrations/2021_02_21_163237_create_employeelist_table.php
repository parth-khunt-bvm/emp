<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeelistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeelist', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('dob');
            $table->string('address');
            $table->string('mobile');
            $table->string('emrgencyContact');
            $table->string('email'); 
            $table->string('edu_with_passing_year');
            $table->string('expreiance');
            $table->string('adharCard');
            $table->string('panCard');
            $table->string('employeeImage');
            $table->string('dateofJoining');
            $table->string('basicSalary');
            $table->integer('designation');
            $table->integer('department');
            $table->string('notes');
            $table->enum('is_deleted',['Yes','No'])->default('No');
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
        Schema::dropIfExists('employeelist');
    }
}
