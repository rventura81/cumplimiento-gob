<?php

class HistorialController extends BaseController {

    protected $layout='backend/template';


    public function getIndex(){
        $query=Historial::orderBy('id','desc');

        if(!Auth::user()->super)
            $query->where('usuario_id','=',Auth::user()->id);


        $data['historial']=$query->paginate(50);

        $this->layout->title = 'Historial de Cambios';
        $this->layout->sidebar=View::make('backend/historial/sidebar',array('item_menu'=>'historial'));
        $this->layout->content = View::make('backend/historial/index', $data);
    }


}