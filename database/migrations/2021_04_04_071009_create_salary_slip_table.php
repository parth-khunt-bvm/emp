<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalarySlipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_slip', function (Blueprint $table) {
            $table->id();
            $table->integer('empDepartment');
            $table->integer('empDesignation');
            $table->integer('employee');
            $table->integer('month');
            $table->integer('year');
            $table->integer('wd');
            $table->integer('wo');
            $table->integer('ph');
            $table->integer('pd');
            $table->integer('lwp');
            $table->integer('basic');
            $table->integer('hra');
            $table->integer('leave_encash');
            $table->integer('produc');
            $table->integer('convei');
            $table->integer('transport');
            $table->integer('pf');
            $table->integer('esi');
            $table->integer('pt');
            $table->integer('tds');
            $table->integer('other');
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
        Schema::dropIfExists('salary_slip');
    }
}
