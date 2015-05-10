<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
			//
Schema::create('sub_cat', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name_sub');
	     	$table->string('d_name_sub');
			$table->integer('cid')->unsigned();
			$table->foreign('cid')->references('id')->on('cat')
			->onDelete('cascade');
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
		//
					Schema::dropIfExists('sub_cat');
	}

}
