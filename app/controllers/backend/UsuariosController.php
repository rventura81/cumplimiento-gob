<?php

class UsuariosController extends BaseController {

    protected $layout='backend/template';

    public function getIndex(){
        $this->layout->title = 'Usuarios';
        $this->layout->content = View::make('backend/usuarios/index', array('usuarios' => Usuario::all()));
    }

    public function getNuevo(){
        $this->layout->title = 'Usuarios';
        $this->layout->content = View::make('backend/usuarios/form', array('usuario' => new Usuario()));
    }

    public function getEditar($usuario_id){
        $this->layout->title = 'Usuarios';
        $this->layout->content = View::make('backend/usuarios/form', array('usuario' => Usuario::find($usuario_id)));
    }

    public function postGuardar($usuario_id = null){

        $validator = Validator::make(Input::all(),array(
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'password' => ($usuario_id ? 'confirmed' : 'required|confirmed')
        ));

        $json = new stdClass();
        if($validator->passes()){
            $usuario = $usuario_id ? Usuario::find($usuario_id) : new Usuario();

            $usuario->fill(Input::all());

            if(Input::get('password', null))
                $usuario->password = Hash::make(Input::get('password'));

            $usuario->save();

            $json->errors = array();
            $json->redirect = URL::to('backend/usuarios');

            $response = Response::json($json, 200);
        } else {
            $json->errors = $validator->messages()->all();
            $response = Response::json($json, 400);
        }

        return $response;
    }
}