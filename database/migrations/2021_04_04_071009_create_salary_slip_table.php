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
            $table->decimal('basic', 8,2);
            $table->decimal('hra_pr', 8,2);
            $table->decimal('hra', 8,2);
            $table->decimal('pt_pr', 8,2);
            $table->decimal('pt', 8,2);
            $table->decimal('ex_tax_pr', 8,2);
            $table->decimal('ex_tax', 8,2);
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
