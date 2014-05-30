<?php

class BackendController extends BaseController {

	protected $layout='backend/template';

	public function getIndex()
	{


        $this->layout->title='Inicio';
        $this->layout->sidebar=View::make('backend/sidebar',array('item_menu'=>null));
		$this->layout->content=View::make('backend/index');
	}

}
