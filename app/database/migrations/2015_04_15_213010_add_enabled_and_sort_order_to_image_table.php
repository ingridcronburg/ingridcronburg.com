<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEnabledAndSortOrderToImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('images', function($table)
		{
			$table->boolean('enabled')->after('location');
			$table->integer('sort_order')->after('enabled');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('images', function($table)
		{
			$table->dropColumn(['enabled', 'sort_order']);
		});
	}

}
