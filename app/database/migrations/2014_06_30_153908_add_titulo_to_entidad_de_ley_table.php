<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTituloToEntidadDeLeyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entidades_de_ley', function(Blueprint $table)
		{
			$table->string('titulo',512);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('entidades_de_ley', function(Blueprint $table)
		{
			$table->dropColumn('titulo');
		});
	}

}
