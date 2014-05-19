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
        $data['usuarios'] = Usuario::all();
        $data['entidades_de_ley']=EntidadDeLey::all();

        $this->layout->title = 'Compromiso';
        $this->layout->content = View::make('backend/compromisos/form', $data);
    }

    public function getEditar($compromiso_id){
        $data['compromiso'] = Compromiso::find($compromiso_id);
        $data['instituciones'] = Institucion::whereNull('institucion_padre_id')->get();
        $data['fuentes'] = Fuente::whereNull('fuente_padre_id')->get();
        $data['usuarios'] = Usuario::all();
        $data['entidades_de_ley']=EntidadDeLey::all();

        $this->layout->title = 'Compromiso';
        $this->layout->content = View::make('backend/compromisos/form', $data);
    }

    public function postGuardar($compromiso_id = null){
        $validator = Validator::make(Input::all(),array(
            'nombre' => 'required',
            'publico' => 'required',
            'fuente' => 'required',
            'institucion' => 'required',
            'usuario' => 'required'
        ));

        $json = new stdClass();
        if($validator->passes()){
            $compromiso = $compromiso_id ? Compromiso::find($compromiso_id) : new Compromiso();

            $compromiso->nombre = Input::get('nombre');
            $compromiso->descripcion = Input::get('descripcion','');
            $compromiso->publico=Input::get('publico');
            $compromiso->fuente()->associate(Fuente::find(Input::get('fuente')));
            $compromiso->institucion()->associate(Institucion::find(Input::get('institucion')));
            $compromiso->usuario()->associate(Usuario::find(Input::get('usuario')));

            $compromiso->save();

            $json->errors = array();
            $json->redirect = URL::to('backend/compromisos');

            Session::flash('messages', array('success' => 'El compromiso "'. $compromiso->nombre .'" ha sido creado.'));

            $response = Response::json($json, 200);
        } else {
            $json->errors = $validator->messages()->all();
            $response = Response::json($json, 400);
        }

        return $response;
    }
}
