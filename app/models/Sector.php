<?php
/**
 * Created by PhpStorm.
 * User: nsilva
 * Date: 13-05-14
 * Time: 12:12
 */

class Sector extends Eloquent{

    protected $table='sectores';
    protected $fillable=array('nombre','lat','lng','tipo');

    public function compromisos(){
        return $this->belongsToMany('Compromiso');
    }
} 