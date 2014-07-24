<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alter2EntidadDeLeyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entidades_de_ley', function(Blueprint $table)
		{
            DB::statement("ALTER TABLE entidades_de_ley CHANGE COLUMN `fecha_ingreso` `fecha_ingreso` DATE DEFAULT NULL;");
            DB::statement("ALTER TABLE entidades_de_ley CHANGE COLUMN `camara_origen` `camara_origen` VARCHAR(128) NOT NULL DEFAULT '';");
            DB::statement("ALTER TABLE entidades_de_ley CHANGE COLUMN `etapa` `etapa` VARCHAR(128)  NOT NULL DEFAULT '';");
            DB::statement("ALTER TABLE entidades_de_ley CHANGE COLUMN `subetapa` `subetapa` VARCHAR(128)  NOT NULL DEFAULT '';");
            DB::statement("ALTER TABLE entidades_de_ley CHANGE COLUMN `iniciativa` `iniciativa` VARCHAR(128)  NOT NULL DEFAULT '';");
            DB::statement("ALTER TABLE entidades_de_ley CHANGE COLUMN `urgencia_actual` `urgencia_actual` VARCHAR(128)  NOT NULL DEFAULT '';");
            DB::statement("ALTER TABLE entidades_de_ley CHANGE COLUMN `titulo` `titulo` VARCHAR(512)  NOT NULL DEFAULT '';");
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
            DB::statement("ALTER TABLE entidades_de_ley CHANGE COLUMN `fecha_ingreso` `fecha_ingreso` DATE NOT NULL;");
            DB::statement("ALTER TABLE entidades_de_ley CHANGE COLUMN `camara_origen` `camara_origen` VARCHAR(128) NOT NULL;");
            DB::statement("ALTER TABLE entidades_de_ley CHANGE COLUMN `etapa` `etapa` VARCHAR(128) NOT NULL;");
            DB::statement("ALTER TABLE entidades_de_ley CHANGE COLUMN `subetapa` `subetapa` VARCHAR(128) NOT NULL;");
            DB::statement("ALTER TABLE entidades_de_ley CHANGE COLUMN `iniciativa` `iniciativa` VARCHAR(128) NOT NULL;");
            DB::statement("ALTER TABLE entidades_de_ley CHANGE COLUMN `urgencia_actual` `urgencia_actual` VARCHAR(128) NOT NULL;");
            DB::statement("ALTER TABLE entidades_de_ley CHANGE COLUMN `titulo` `titulo` VARCHAR(512) NOT NULL;");
		});
	}

}
