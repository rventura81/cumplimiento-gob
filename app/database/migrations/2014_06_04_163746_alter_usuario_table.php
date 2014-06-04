<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usuarios', function(Blueprint $table)
		{
            DB::statement("ALTER TABLE usuarios CHANGE COLUMN `remember_token` `remember_token` VARCHAR(60) NOT NULL DEFAULT '';");
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('usuarios', function(Blueprint $table)
		{
            DB::statement("ALTER TABLE usuarios CHANGE COLUMN `remember_token` `remember_token` VARCHAR(60) NOT NULL;");
		});
	}

}
