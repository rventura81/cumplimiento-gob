<?php

class ReportesController extends BaseController{

    protected $layout='backend/template';

    public function getIndex(){
        return Redirect::to('backend/reportes/hitos');
    }

    public function getHitos(){
        $data=array();

        $this->layout->title='reportes';
        $this->layout->sidebar = View::make('backend/reportes/sidebar',array('item_menu'=>'hitos'));
        $this->layout->content= View::make('backend/reportes/hitos', $data);
    }

}