<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityKostPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_kost', function (Blueprint $table) {
            $table->integer('facility_id')->unsigned()->index();
            $table->foreign('facility_id')->references('id')->on('facilities')->onDelete('cascade');
            $table->integer('kost_id')->unsigned()->index();
            $table->foreign('kost_id')->references('id')->on('kosts')->onDelete('cascade');
            $table->primary(['facility_id', 'kost_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facility_kost');
    }
}
