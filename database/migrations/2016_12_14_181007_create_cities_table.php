<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCitiesTable extends Migration {

	public function up()
	{
		Schema::create('cities', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('province_id')->unsigned();
			$table->string('type');
			$table->string('name');
			$table->integer('postal_code');
		});
	}

	public function down()
	{
		Schema::drop('cities');
	}
}