<?php

use Modernizacion\Helpers\SphinxHelper;

class CompromisosController extends BaseController {

	protected $layout='backend/template';


    public function getIndex(){
        $q = Input::get('q');

        $data['compromisos'] = $data['compromisos_chart'] = $data['fuentes'] = $data['instituciones'] = $data['tags'] = $data['sectores'] = $data['tipos'] = $data['avances'] = array();
        $data['input'] = array_merge(array('instituciones' => array(),'tags'=>array(), 'sectores' => array(), 'fuentes' => array(), 'tipos' => array(), 'avances'=> array()), Input::all());

        $sphinxHelper=new SphinxHelper(new \Scalia\SphinxSearch\SphinxSearch());
        $result = $sphinxHelper->search($q, $data['input']);

        $ids = $result['ids'];

        if($ids){
            $data['filtros'] = $data['filtros_count'] = array();
            foreach($result['filters'] as $name => $filter){
                $filters_id = array_flatten($filter);
                $data['filtros'][$name] = array_unique($filters_id);
                $data['filtros_count'][$name] = array_count_values($filters_id);
            }

            $data['compromisos'] = Compromiso::whereIn('id', $ids)->get();
            $data['compromisos_chart']=DB::table('compromisos')->whereIn('id', $ids)->groupBy('avance')->select(DB::raw('count(*) as data, avance as label'))->get();
            $data['fuentes'] = Fuente::with('hijos', 'hijos.hijos')->whereNull('fuente_padre_id')->get();
            $data['instituciones'] = Institucion::with('hijos')->whereNull('institucion_padre_id')->get();
            $data['sectores'] = Sector::with('hijos.hijos')->whereNull('sector_padre_id')->get();
            $data['tags'] = Tag::all();
            $data['tipos'] = $sphinxHelper->getFiltrosTipo($data['filtros']['tipo']);
            $data['avances'] = $sphinxHelper->getFiltrosAvance($data['filtros']['avance']);
        }

        $this->layout->busqueda = $data['q'] = $q;
        $this->layout->title='Buscar';

        $this->layout->sidebar = View::make('backend/compromisos/sidebar_search', $data);
        $this->layout->content= View::make('backend/compromisos/index', $data);
    }
/*
	public function getIndex()
	{
        $offset = Input::get('offset', 0);
        $limit = Input::get('limit', 10);

        $compromisos = Compromiso::limit($limit)->offset($offset)->get();

        $this->layout->title='Inicio';
        $this->layout->sidebar=View::make('backend/compromisos/sidebar',array('item_menu'=>'compromisos'));
		$this->layout->content=View::make('backend/compromisos/index', array('compromisos' => $compromisos));
	}
*/
    public function getVer($compromiso_id){
        $this->layout->title = 'Compromiso';
        $this->layout->sidebar=View::make('backend/compromisos/sidebar',array('item_menu'=>'compromisos'));
        $this->layout->content = View::make('backend/compromisos/view', array('compromiso' => Compromiso::find($compromiso_id)));
    }

    public function getNuevo(){
        $data['compromiso'] = new Compromiso();
        $data['instituciones'] = Institucion::whereNull('institucion_padre_id')->get();
        $data['sectores'] = Sector::whereNull('sector_padre_id')->get();
        $data['fuentes'] = Fuente::whereNull('fuente_padre_id')->get();
        $data['usuarios'] = Usuario::all();
        $data['entidades_de_ley']=EntidadDeLey::all();
        $data['tags']=Tag::all()->lists('nombre');;

        $this->layout->title = 'Compromiso';
        $this->layout->sidebar=View::make('backend/compromisos/sidebar',array('item_menu'=>'compromisos'));
        $this->layout->content = View::make('backend/compromisos/form', $data);
    }

    public function getEditar($compromiso_id){
        $data['compromiso'] = Compromiso::find($compromiso_id);
        $data['instituciones'] = Institucion::whereNull('institucion_padre_id')->get();
        $data['sectores'] = Sector::whereNull('sector_padre_id')->get();
        $data['fuentes'] = Fuente::whereNull('fuente_padre_id')->get();
        $data['usuarios'] = Usuario::all();
        $data['entidades_de_ley']=EntidadDeLey::all();
        $data['tags']=Tag::all()->lists('nombre');

        $this->layout->title = 'Compromiso';
        $this->layout->sidebar=View::make('backend/compromisos/sidebar',array('item_menu'=>'compromisos'));
        $this->layout->content = View::make('backend/compromisos/form', $data);
    }

    public function postGuardar($compromiso_id = null){
        $validator = Validator::make(Input::all(),array(
            'nombre' => 'required',
            'publico' => 'required',
            'fuente' => 'required',
            'institucion' => 'required',
            'usuario' => 'required',
            'tipo'=>'required',
            'avance'=>'required'
        ));

        $json = new stdClass();
        if($validator->passes()){
            DB::connection()->getPdo()->beginTransaction();

            $compromiso = $compromiso_id ? Compromiso::find($compromiso_id) : new Compromiso();

            $compromiso->nombre = Input::get('nombre');
            $compromiso->descripcion = Input::get('descripcion','');
            $compromiso->beneficios = Input::get('beneficios','');
            $compromiso->metas = Input::get('metas','');
            $compromiso->publico=Input::get('publico');
            $compromiso->anuncio=Input::get('anuncio');
            $compromiso->anuncio_emisor=Input::get('anuncio_emisor');
            $compromiso->tipo=Input::get('tipo');
            $compromiso->avance=Input::get('avance');
            $compromiso->avance_descripcion=Input::get('avance_descripcion');
            $compromiso->institucion()->associate(Institucion::find(Input::get('institucion')));
            $compromiso->fuente()->associate(Fuente::find(Input::get('fuente')));
            $compromiso->usuario()->associate(Usuario::find(Input::get('usuario')));

            $compromiso->save();

            $tag_arr=Input::get('tags')?explode(',',Input::get('tags')):array();
            $tag_ids=array();
            foreach($tag_arr as $t){
                $tag=Tag::firstOrNew(array('nombre'=>$t));
                $tag->save();
                $tag_ids[]=$tag->id;
            }
            $compromiso->tags()->sync($tag_ids);

            $compromiso->sectores()->sync(Input::get('sectores',array()));

            $compromiso->institucionesRelacionadas()->sync(Input::get('instituciones_relacionadas',array()));
            $compromiso->entidadesDeLey()->sync(Input::get('entidades_de_ley',array()));

            $compromiso->hitos()->delete();
            $hitos=Input::get('hitos',array());
            foreach($hitos as $h){
                $new_hito=new Hito();
                $new_hito->descripcion=$h['descripcion'];
                $new_hito->fecha=\Carbon\Carbon::parse($h['fecha']);
                $compromiso->hitos()->save($new_hito);
            }


            $compromiso->mediosDeVerificacion()->delete();
            $medios=Input::get('medios-de-verificacion',array());
            foreach($medios as $m){
                $new_medio=new MedioDeVerificacion($m);
                $compromiso->mediosDeVerificacion()->save($new_medio);
            }

            DB::connection()->getPdo()->commit();

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

    public function getEliminar($compromiso_id){
        $compromiso = Compromiso::find($compromiso_id);
        $this->layout = View::make('backend/ajax_template');
        $this->layout->title = 'Eliminar Compromiso';
        $this->layout->content = View::make('backend/compromisos/delete', array('compromiso' => $compromiso));
    }

    public function deleteEliminar($compromiso_id){
        $compromiso = Compromiso::find($compromiso_id);
        $compromiso->delete();

        return Redirect::to('backend/compromisos')->with('messages', array('success' => 'El compromiso ' . $compromiso->nombre . ' ha sido eliminada.'));
    }
}
