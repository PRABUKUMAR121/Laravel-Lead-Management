<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            //
            $table->date('lead_given_date')->after('lead_name');
            $table->date('assigned_date')->after('assigned_to')->nullable();
             $table->date('solution_date')->after('closed_status')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            //

            $table->dropColumn('lead_given_date');
            $table->dropColumn('assigned_date');
            $table->dropColumn('solution_date');

        });
    }
};
