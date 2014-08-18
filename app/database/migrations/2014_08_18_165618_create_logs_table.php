<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('logs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->text('descripcion');
            $table->integer('compromiso_id')->unsigned()->nullable();
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('compromiso_id')->references('id')->on('compromisos')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('logs');
	}

}
