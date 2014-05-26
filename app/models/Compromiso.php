<?php
/**
 * Created by PhpStorm.
 * User: nsilva
 * Date: 13-05-14
 * Time: 11:23
 */

class Compromiso extends Eloquent{

    protected $fillable = array('nombre','descripcion','publico','anuncio','anuncio_emisor','tipo');

    public function fuente(){
        return $this->belongsTo('Fuente');
    }

    public function mediosDeVerificacion(){
        return $this->hasMany('MedioDeVerificacion');
    }

    public function usuario(){
        return $this->belongsTo('Usuario');
    }

    public function institucion(){
        return $this->belongsTo('Institucion','institucion_responsable_id');
    }

    public function institucionesRelacionadas(){
        return $this->belongsToMany('Institucion');
    }

    public function entidadesDeLey(){
        return $this->belongsToMany('EntidadDeLey');
    }

    public function sectores(){
        return $this->belongsToMany('Sector');
    }

    public function tags(){
        return $this->belongsToMany('Tag');
    }

} 