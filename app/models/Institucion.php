<?php

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