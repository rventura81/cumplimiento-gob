<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAvanceInEntidadDeLeyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('compromisos', function(Blueprint $table)
		{
            DB::statement("ALTER TABLE compromisos CHANGE COLUMN `avance` `avance` ENUM('No Iniciado','En Proceso','Atrasado','Cumplido','Con Problemas','Reformulado') NOT NULL DEFAULT 'No Iniciado';");
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
            DB::statement("ALTER TABLE compromisos CHANGE COLUMN `avance` `avance` ENUM('No Iniciado','En Proceso','Atrasado','Cumplido') NOT NULL DEFAULT 'No Iniciado';");
		});
	}

}
