<?php

class EntidadesController extends BaseController {

    protected $layout='backend/template';
    protected $item_menu = 'entidades';

    public function getIndex(){
        $offset = Input::get('offset', 0);
        $limit = Input::get('limit', 10);

        $entidades = EntidadDeLey::limit($limit)->offset($offset)->get();

        $this->layout->title='Entidades';
        $this->layout->content=View::make('backend/entidades/index', array('entidades' => $entidades));
    }

    public function getVer($entidad_id){
        $this->layout->title = 'Entidades';
        $this->layout->content = View::make('backend/entidades/view', array('entidad' => EntidadDeLey::find($entidad_id)));
    }

    public function getNueva(){
        $data['entidad'] = new EntidadDeLey();

        $this->layout->title = 'Entidades';
        $this->layout->content = View::make('backend/entidades/form', $data);
    }

    public function getEditar($entidad_id){
        $data['entidad'] = EntidadDeLey::find($entidad_id);

        $this->layout->title = 'Entidades';
        $this->layout->content = View::make('backend/entidades/form', $data);
    }

    public function postGuardar($entidad_id = null){
        $validator = Validator::make(Input::all(), array(
            'nombre' => 'required',
            'tipo' => 'required',
            'numero_boletin' => 'required',
            'estado' => 'required'
        ));

        $json = new stdClass();
        if($validator->passes()){
            $entidad = $entidad_id ? EntidadDeLey::find($entidad_id) : new EntidadDeLey();

            $entidad->nombre = Input::get('nombre', '');
            $entidad->tipo = Input::get('tipo');
            $entidad->numero_boletin = Input::get('numero_boletin');
            $entidad->estado = Input::get('estado');
            $entidad->save();

            $json->errors = array();
            $json->redirect = URL::to('backend/entidades');

            Session::flash('messages', array('success' => 'La entidad de ley '. $entidad->nombre .' ha sido creada.'));

            $response = Response::json($json, 200);
        } else {
            $json->errors = $validator->messages()->all();
            $response = Response::json($json, 400);
        }

        return $response;
    }

    public function getEliminar($entidad_id){
        $entidad = EntidadDeLey::find($entidad_id);
        $this->layout = View::make('backend/ajax_template');
        $this->layout->title = 'Eliminar Entidad de ley';
        $this->layout->content = View::make('backend/entidades/delete', array('entidad' => $entidad));
    }

    public function deleteEliminar($entidad_id){
        $entidad = EntidadDeLey::find($entidad_id);
        $entidad->delete();

        return Redirect::to('backend/entidades')->with('messages', array('success' => 'La entidad de ley' . $entidad->nombre . ' ha sido eliminada.'));
    }
}