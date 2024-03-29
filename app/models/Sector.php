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

    public function padre(){
        return $this->belongsTo('Sector', 'sector_padre_id', 'id');
    }

    public function hijos(){
        return $this->hasMany('Sector', 'sector_padre_id', 'id');
    }

    public function getRegionAttribute(){
        if($this->padre && $this->padre->tipo=='region')
            return $this->padre;
        elseif($this->padre && $this->padre->padre && $this->padre->padre->tipo=='region')
            return $this->padre->padre;

        return $this;
    }
} 