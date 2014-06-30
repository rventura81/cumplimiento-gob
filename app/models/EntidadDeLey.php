<?php
/**
 * Created by PhpStorm.
 * User: nsilva
 * Date: 13-05-14
 * Time: 12:08
 */

class EntidadDeLey extends Eloquent{

    protected $table='entidades_de_ley';
    protected $fillable=array('nombre','borrador','numero_boletin','estado','fecha_ingreso','camara_origen','etapa','subetapa','iniciativa','urgencia_actual','titulo');

    public function getDates()
    {
        return array('created_at','updated_at','fecha_ingreso');
    }

    public function compromisos(){
        return $this->belongsToMany('Compromiso');
    }

} 