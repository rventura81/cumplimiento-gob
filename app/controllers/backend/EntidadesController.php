<?php

class EntidadesController extends BaseController {

    protected $layout='backend/template';

    public function getIndex(){
        $entidades = EntidadDeLey::with('compromisos');

        $this->layout->title='Entidades';
        $this->layout->sidebar=View::make('backend/entidades/sidebar',array('item_menu'=>'entidades'));
        $this->layout->content=View::make('backend/entidades/index', array('entidades' => $entidades->get()));
    }

    public function getVer($entidad_id){
        $entidad=EntidadDeLey::find($entidad_id);

        if(!Auth::user()->super && count($entidad->compromisos->filter(function($c){return $c->usuario_id==Auth::user()->id;})) == 0){
            App::abort(403, 'Unauthorized action.');
        }

        $this->layout->title = 'Entidades';
        $this->layout->sidebar=View::make('backend/entidades/sidebar',array('item_menu'=>'entidades'));
        $this->layout->content = View::make('backend/entidades/view', array('entidad' => $entidad));
    }

    public function getNueva(){
        $data['entidad'] = new EntidadDeLey();

        if(Request::ajax()){
            $view = 'backend/entidades/ajax_form';
            $this->layout = View::make('backend/ajax_template');
        } else {
            $view = 'backend/entidades/normal_form';
        }

        $this->layout->title = 'Entidades';
        $this->layout->sidebar=View::make('backend/entidades/sidebar',array('item_menu'=>'entidades'));
        $this->layout->content = View::make($view, $data);
    }

    public function getEditar($entidad_id){
        $entidad = EntidadDeLey::find($entidad_id);

        $data['entidad']=$entidad;

        if(Request::ajax()){
            $view = 'backend/entidades/ajax_form';
            $this->layout = View::make('backend/ajax_template');
        } else {
            $view = 'backend/entidades/normal_form';
        }

        $this->layout->title = 'Entidades';
        $this->layout->sidebar=View::make('backend/entidades/sidebar',array('item_menu'=>'entidades'));
        $this->layout->content = View::make($view, $data);
    }

    public function postGuardar($entidad_id = null){
        $validator = Validator::make(Input::all(), array(
            'nombre' => 'required',
            'borrador' => 'required',
            'numero_boletin' => array('regex:/^\d{4}\-\d{2}$/'),
            'estado' => 'required'
        ));

        $json = new stdClass();
        if($validator->passes()){
            $entidad = $entidad_id ? EntidadDeLey::find($entidad_id) : new EntidadDeLey();

            $entidad->nombre = Input::get('nombre', '');
            $entidad->borrador = Input::get('borrador');
            $entidad->numero_boletin = Input::get('numero_boletin');
            $entidad->estado = Input::get('estado');

            $entidad->save();

            $json->errors = array();

            if(Input::get('is_modal', false)){
                $json->entidad['id'] = $entidad->id;
                $json->entidad['nombre'] = $entidad->nombre;
                $json->entidad['numero_boletin'] = $entidad->numero_boletin;
            }else{
                $json->redirect = URL::to('backend/entidades');
                Session::flash('messages', array('success' => 'La entidad de ley '. $entidad->nombre .' ha sido creada.'));
            }

            $response = Response::json($json, 200);
        } else {
            $json->errors = $validator->messages()->all();
            $response = Response::json($json, 400);
        }

        return $response;
    }

    public function getEliminar($entidad_id){
        $entidad = EntidadDeLey::find($entidad_id);

        if(!Auth::user()->super && count($entidad->compromisos->filter(function($c){return $c->usuario_id==Auth::user()->id;})) == 0){
            App::abort(403, 'Unauthorized action.');
        }

        $this->layout = View::make('backend/ajax_template');
        $this->layout->title = 'Eliminar Entidad de ley';
        $this->layout->content = View::make('backend/entidades/delete', array('entidad' => $entidad));
    }

    public function deleteEliminar($entidad_id){
        $entidad = EntidadDeLey::find($entidad_id);

        if(!Auth::user()->super && count($entidad->compromisos->filter(function($c){return $c->usuario_id==Auth::user()->id;})) == 0){
            App::abort(403, 'Unauthorized action.');
        }

        $entidad->delete();

        return Redirect::to('backend/entidades')->with('messages', array('success' => 'La entidad de ley' . $entidad->nombre . ' ha sido eliminada.'));
    }
}