<?php

class BackendController extends BaseController {

	protected $layout='backend/template';

	public function getIndex()
	{


        $this->layout->title='Inicio';
		$this->layout->content=View::make('backend/index');
	}

}
