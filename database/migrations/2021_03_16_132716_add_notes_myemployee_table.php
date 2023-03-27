<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNotesMyemployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('myemployee', function (Blueprint $table) {
            //
            $table->text("notes")->nullable()->after('esino');
            $table->enum('is_deleted',['Y','N'])->default('N')->comments("Y for Yes , N for No")->after('notes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('myemployee', function (Blueprint $table) {
            //
        });
    }
}
