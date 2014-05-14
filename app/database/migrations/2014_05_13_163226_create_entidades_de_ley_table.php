<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidadesDeLeyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entidades_de_ley', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nombre');
            $table->enum('tipo', array('borrador','proyecto','ley'));
            $table->string('numero_boletin', 10);
            $table->string('estado');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('entidades_de_ley');
	}

}
