<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingCompleteFieldsToAlbum extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('albums', function(Blueprint $table)
        {
            $table->boolean('complete')->default(false);
            $table->integer('popularity')->unsigned()->nullable();
            $table->string('release_date', 20)->nullable();
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
            $table->dropColumn('complete');
            $table->dropColumn('popularity');
            $table->dropColumn('release_date');
        });
	}

}
