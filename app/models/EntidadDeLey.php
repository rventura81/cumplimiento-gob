<?php
/**
 * Created by PhpStorm.
 * User: nsilva
 * Date: 13-05-14
 * Time: 12:08
 */

class EntidadDeLey extends Eloquent{

    protected $table='entidades_de_ley';
    protected $fillable=array('nombre','tipo','numero_boletin','estado');

    public function compromisos(){
        return $this->belongsToMany('Compromiso');
    }

} 