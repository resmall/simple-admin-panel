<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('content', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('page_title', 100);
			$table->text('page_content');
			$table->integer('featured_image_id')->unsigned();
			$table->string('content_type', 50)->index();
			$table->integer('gallery_id')->unsigned();
			$table->integer('user_id')->unsigned()->index();
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
		Schema::drop('content');
	}

}
