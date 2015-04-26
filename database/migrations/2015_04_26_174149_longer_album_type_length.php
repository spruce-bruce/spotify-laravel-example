<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LongerAlbumTypeLength extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('albums', function(Blueprint $table)
		{
            /*
             * Before changing a column, be sure to add the doctrine/dbal
             * dependency to your composer.json file.
             */
            $table->string('album_type', 20)->change();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('albums', function(Blueprint $table)
		{
            $table->string('album_type', 10)->change();
		});
	}

}
