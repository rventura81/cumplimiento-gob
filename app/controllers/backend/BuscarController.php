<?php

use Modernizacion\Helpers\SphinxHelper;

class BuscarController extends BaseController {

    protected $layout='backend/template';
    protected $item_menu = 'buscar';


    /**
     * @var SphinxHelper
     */
    private $sphinxHelper;

    function __construct(SphinxHelper $sphinxHelper)
    {
        $this->sphinxHelper = $sphinxHelper;
    }


    public function getIndex(){
        $q = Input::get('q');

        $data['compromisos'] = $data['compromisos_chart'] = $data['fuentes'] = $data['instituciones'] = $data['tipos'] = array();
        $data['input'] = array_merge(array('instituciones' => array(), 'fuentes' => array(), 'tipos' => array()), Input::all());

        $result = $this->sphinxHelper->search($q, $data['input']);

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
            $data['tipos'] = $this->sphinxHelper->getFiltrosTipo($data['filtros']['tipo']);
        }

        $this->layout->busqueda = $data['q'] = $q;
        $this->layout->title='Buscar';

        $this->layout->sidebar = View::make('backend/busquedas/sidebar', $data);
        $this->layout->content= View::make('backend/busquedas/results', $data);
    }
}