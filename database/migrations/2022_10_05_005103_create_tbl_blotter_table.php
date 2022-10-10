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
        Schema::create('tbl_blotter', function (Blueprint $table) {
            $table->id();
            $table->string('complainant')->nullable();
            $table->string('complain_statement')->nullable();
            $table->string('respondent')->nullable();
            $table->string('person_involved')->nullable();
            $table->string('location_incident')->nullable();
            $table->string('incident_type')->nullable();
            $table->dateTime('dateTime_reported')->nullable();
            $table->dateTime('dateTime_incident')->nullable();
            $table->string('status')->nullable();
            $table->string('remarks')->nullable();
            $table->string('action_take')->nullable();
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
        Schema::dropIfExists('tbl_blotter');
    }
};
