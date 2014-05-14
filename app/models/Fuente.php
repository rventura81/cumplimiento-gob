<?php
/**
 * Created by PhpStorm.
 * User: nsilva
 * Date: 13-05-14
 * Time: 11:34
 */

class Fuente extends Eloquent{

    protected $fillable=array('nombre','tipo');

    public function compromisos(){
        return $this->hasMany('Compromiso');
    }

} 