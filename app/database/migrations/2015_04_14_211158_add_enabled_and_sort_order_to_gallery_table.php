<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEnabledAndSortOrderToGalleryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('galleries', function($table)
		{
			$table->boolean('enabled')->after('name');
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
		Schema::table('galleries', function($table)
		{
			$table->dropColumn(['enabled', 'sort_order']);
		});
	}

}
