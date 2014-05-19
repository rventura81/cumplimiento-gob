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

        $result = $this->sphinxHelper->search($q);

        $ids = $result['ids'];
        $filters = $result['filters'];

        $data['results'] = $data['fuentes'] = $data['instituciones'] = $data['entidades'] = array();

        if($ids){
            $data['results'] = Compromiso::whereIn('id', $ids)->get();
            $data['fuentes'] = Fuente::whereIn('id', $filters['fuente'])->get();
            $data['instituciones'] = Institucion::whereIn('id', $filters['institucion'])->get();
//            $data['entidades'] = EntidadDeLey::all();
        }

        $this->layout->busqueda = $q;
        $this->layout->title='Buscar';

        $this->layout->filtros = View::make('backend/busquedas/filters', $data);
        $this->layout->content= View::make('backend/busquedas/results', $data);
    }
} 