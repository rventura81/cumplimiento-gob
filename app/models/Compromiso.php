<?php
/**
 * Created by PhpStorm.
 * User: nsilva
 * Date: 13-05-14
 * Time: 11:23
 */

class Compromiso extends Eloquent{

    protected $fillable = array('nombre','descripcion','publico','anuncio','anuncio_emisor','tipo','beneficios','metas','avance','avance_descripcion');

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

    public function hitos(){
        return $this->hasMany('Hito');
    }

    public function getRegionesAttribute(){
        $regiones=new \Illuminate\Database\Eloquent\Collection();
        $this->sectores->each(function($sector) use ($regiones){
            if($sector->region)
                $regiones->push($sector->region);
        });

        return $regiones->unique();
    }

} 