<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTracks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tracks', function(Blueprint $table)
		{
            $table->string('id', 30);
            $table->string('album_id', 30);
            $table->string('name');
            $table->integer('disc_number');
            $table->integer('duration_ms');
            $table->boolean('explicit');
            $table->string('href', 100);
            $table->string('preview_url', 100);
            $table->integer('track_number');
            $table->string('type', 20);
            $table->string('uri', 100);
            $table->timestamps();

            $table->primary('id');
            $table->foreign('album_id')->references('id')->on('albums');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tracks');
	}

}
