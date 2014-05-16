<?php

class CompromisosController extends BaseController {

	protected $layout='backend/template';

	public function getIndex()
	{
        $offset = Input::get('offset', 0);
        $limit = Input::get('limit', 10);

        $compromisos = Compromiso::limit($limit)->offset($offset)->get();

        $this->layout->title='Inicio';
		$this->layout->content=View::make('backend/compromisos/index', array('compromisos' => $compromisos));
	}

    public function getNuevo(){
        $data['compromiso'] = new Compromiso();
        $data['instituciones'] = Institucion::all();

        $this->layout->title = 'Compromiso';
        $this->layout->content = View::make('backend/compromisos/form', $data);
    }
}
