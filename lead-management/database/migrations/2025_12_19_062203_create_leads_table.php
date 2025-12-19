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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('lead_name');
            $table->string('email');
            $table->string('phone');
            $table->string('company')->nullable();
            $table->string('lead_source');
            $table->string('assigned_to')->nullable();
            $table->string('lead_priority');
            $table->string('lead_status');
            $table->string('closed_status')->nullable();
            $table->string('enquiry_remarks')->nullable();
            $table->string('solution_remarks')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
};
