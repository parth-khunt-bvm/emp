<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTaxColSalarySlipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salary_slip', function (Blueprint $table) {
            $table->dropColumn(['ex_tax_pr', 'ex_tax']);
            $table->integer('lop')->after('wd');
            $table->decimal('income_tax_pr', 8,2)->after('pt');
            $table->decimal('income_tax', 8,2)->after('income_tax_pr');
            $table->decimal('pf_pr', 8,2)->after('income_tax');
            $table->decimal('pf', 8,2)->after('pf_pr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
