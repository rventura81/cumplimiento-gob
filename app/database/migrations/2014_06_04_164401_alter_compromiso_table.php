<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCompromisoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('compromisos', function(Blueprint $table)
		{
            DB::statement("ALTER TABLE compromisos CHANGE COLUMN `nombre` `nombre` TEXT NOT NULL;");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('compromisos', function(Blueprint $table)
		{
            DB::statement("ALTER TABLE compromisos CHANGE COLUMN `nombre` `nombre` VARCHAR(255) NOT NULL;");
		});
	}

}
