<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipoToCompromisoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('compromisos', function(Blueprint $table)
		{
            $table->enum('tipo', array('Medida de Gestión', 'Proyecto de Ley'))->default('Proyecto de Ley');
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
			$table->dropColumn('tipo');
		});
	}

}
