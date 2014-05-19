<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipoToMedioDeVerificacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('medios_de_verificacion', function(Blueprint $table)
		{
			$table->dropColumn('nombre');
            $table->string('tipo',64);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('medios_de_verificacion', function(Blueprint $table)
		{
            $table->string('nombre');
			$table->dropColumn('tipo');
		});
	}

}
