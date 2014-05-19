<?php

class CompromisosController extends BaseController {

	protected $layout='backend/template';
    protected $item_menu = 'compromisos';

	public function getIndex()
	{
        $offset = Input::get('offset', 0);
        $limit = Input::get('limit', 10);

        $compromisos = Compromiso::limit($limit)->offset($offset)->get();

        $this->layout->title='Inicio';
		$this->layout->content=View::make('backend/compromisos/index', array('compromisos' => $compromisos));
	}

    public function getVer($compromiso_id){
        $this->layout->title = 'Compromiso';
        $this->layout->content = View::make('backend/compromisos/view', array('compromiso' => Compromiso::find($compromiso_id)));
    }

    public function getNuevo(){
        $data['compromiso'] = new Compromiso();
        $data['instituciones'] = Institucion::whereNull('institucion_padre_id')->get();
        $data['fuentes'] = Fuente::whereNull('fuente_padre_id')->get();

        $this->layout->title = 'Compromiso';
        $this->layout->content = View::make('backend/compromisos/form', $data);
    }
}
