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
        echo '<pre>';
        print_r(Input::all());
        echo '</pre>';
        if($usuario_id)
            $usuario = Usuario::find($usuario_id);
        else
            $usuario = new Usuario();

        return Response::json($usuario);
    }
}