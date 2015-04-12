<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('albums', function($table) {
            $table->string('id', 30);
            $table->string('type', 10);
            $table->string('album_type', 10);
            $table->string('href', 100);
            $table->string('uri', 100);

            $table->primary('id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('albums');
	}

}
