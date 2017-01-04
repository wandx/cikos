<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('distance')->unsigned();
            $table->string('display_name');
            $table->integer('kost_id')->unsigned();

            $table->foreign('kost_id')->references('id')->on('kosts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_facilities');
    }
}
