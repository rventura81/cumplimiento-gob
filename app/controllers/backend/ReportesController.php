<?php

class ReportesController extends BaseController{

    protected $layout='backend/template';

    public function getIndex(){
        return Redirect::to('backend/reportes/hitos');
    }

    public function getHitos(){
        $data['hitos']=Hito::where('fecha','>=','2014-01-01')->orderBy('fecha')->with('compromiso')->get();

        $this->layout->title='Próximos hitos relevantes';
        $this->layout->sidebar = View::make('backend/reportes/sidebar',array('item_menu'=>'hitos'));
        $this->layout->content= View::make('backend/reportes/hitos', $data);
    }

}