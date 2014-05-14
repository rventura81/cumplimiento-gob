<?php
/**
 * Created by PhpStorm.
 * User: nsilva
 * Date: 13-05-14
 * Time: 11:58
 */

class Institucion extends Eloquent{

    protected $table='instituciones';
    protected $fillable=array('nombre','tipo');

    public function institucionesHijas(){
        return $this->hasMany('Institucion');
    }

    public function institucionPadre(){
        return $this->belongsTo('Institucion');
    }

    public function compromisos(){
        return $this->hasMany('Compromiso');
    }

    public function compromisosRelacionados(){
        return $this->belongsToMany('Compromiso');
    }

} 