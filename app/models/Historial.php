<?php
/**
 * Created by PhpStorm.
 * User: nsilva
 * Date: 13-05-14
 * Time: 11:45
 */

class Historial extends Eloquent{

    protected $table = 'logs';

    public function compromiso(){
        return $this->belongsTo('Compromiso');
    }

    public function usuario(){
        return $this->belongsTo('Usuario');
    }

} 