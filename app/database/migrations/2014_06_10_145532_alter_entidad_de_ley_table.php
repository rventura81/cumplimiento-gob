<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEntidadDeLeyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entidades_de_ley', function(Blueprint $table)
		{
			$table->date('fecha_ingreso');
            $table->string('camara_origen',128);
            $table->string('etapa',128);
            $table->string('subetapa',128);
            $table->string('iniciativa',128);
            $table->string('urgencia_actual',128);

            DB::statement("ALTER TABLE entidades_de_ley CHANGE COLUMN `tipo` `borrador` tinyint(1) NOT NULL DEFAULT '1';");
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
			$table->dropColumn('fecha_ingreso');
            $table->dropColumn('camara_origen');
            $table->dropColumn('etapa');
            $table->dropColumn('subetapa');
            $table->dropColumn('iniciativa');
            $table->dropColumn('urgencia_actual');

            DB::statement("ALTER TABLE entidades_de_ley CHANGE COLUMN `borrador` `tipo` ENUM('borrador','proyecto','ley') NOT NULL;");
		});
	}

}
