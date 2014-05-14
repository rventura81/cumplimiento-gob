<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompromisosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compromisos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nombre', 255);
            $table->text('descripcion');
            $table->boolean('publico');
            $table->integer('institucion_responsable_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->integer('fuente_id')->unsigned();
			$table->timestamps();

            $table->foreign('institucion_responsable_id')->references('id')->on('instituciones')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('fuente_id')->references('id')->on('fuentes')->onDelete('cascade');
		});

        Schema::create('compromiso_institucion', function(Blueprint $table)
        {
            $table->integer('compromiso_id')->unsigned();
            $table->integer('institucion_id')->unsigned();

            $table->foreign('compromiso_id')->references('id')->on('compromisos')->onDelete('cascade');
            $table->foreign('institucion_id')->references('id')->on('instituciones')->onDelete('cascade');
        });

        Schema::create('compromiso_tag', function(Blueprint $table)
        {
            $table->integer('compromiso_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('compromiso_id')->references('id')->on('compromisos')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });

        Schema::create('compromiso_sector', function(Blueprint $table)
        {
            $table->integer('compromiso_id')->unsigned();
            $table->integer('sector_id')->unsigned();

            $table->foreign('compromiso_id')->references('id')->on('compromisos')->onDelete('cascade');
            $table->foreign('sector_id')->references('id')->on('sectores')->onDelete('cascade');
        });

        Schema::create('compromiso_entidad_de_ley', function(Blueprint $table)
        {
            $table->integer('compromiso_id')->unsigned();
            $table->integer('entidad_de_ley_id')->unsigned();

            $table->foreign('compromiso_id')->references('id')->on('compromisos')->onDelete('cascade');
            $table->foreign('entidad_de_ley_id')->references('id')->on('entidades_de_ley')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('compromiso_institucion');
        Schema::drop('compromiso_tag');
        Schema::drop('compromiso_sector');
        Schema::drop('compromiso_entidad_de_ley');
		Schema::drop('compromisos');
	}

}
