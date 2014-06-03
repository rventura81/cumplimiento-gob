<?php

class HitosController extends BaseController{

    protected $layout='backend/template';

    public function getIndex(){
        return Redirect::to('backend/hitos/proximos');
    }

    public function getProximos(){
        $data['hitos']=Hito::where('fecha','>=',\Carbon\Carbon::now()->toDateString())->orderBy('fecha')->with('compromiso')->get();

        $this->layout->title='Próximos hitos relevantes';
        $this->layout->sidebar = View::make('backend/hitos/sidebar',array('item_menu'=>'hitos'));
        $this->layout->content= View::make('backend/hitos/proximos', $data);
    }

}