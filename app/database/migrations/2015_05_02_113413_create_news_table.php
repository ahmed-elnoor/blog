<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('news', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('cid'); // cat id
            $table->string('sid'); // sub id
			$table->string('home'); // home page 
			$table->string('subject');
			$table->text('long_news');
            $table->string('author');
			$table->string('author_id');
            $table->text('file');
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
				Schema::drop('news');

	}

}
