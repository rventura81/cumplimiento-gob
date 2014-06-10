<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CronDaily extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'cron:daily';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Proceso batch que se debe ejecutar en forma diaria.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $this->info('Actualizando informacion de entidades de ley.');

        $client = new Guzzle\Http\Client();

        $entidades=EntidadDeLey::where('borrador',0)->get();
        foreach($entidades as $e){
            $this->info('Actualizando Ley con Nro Boletín: '.$e->numero_boletin);
            $codigo=explode('-',$e->numero_boletin);
            $codigo=$codigo[0];

            try{
                $req = $client->get('http://www.senado.cl/wspublico/tramitacion.php?boletin='.$codigo);
                $res=$req->send();


                $xml = $res->xml();

                if($xml->proyecto){
                    $e->nombre=$xml->proyecto->descripcion->titulo;
                    $e->estado=$xml->proyecto->descripcion->estado;
                    $e->fecha_ingreso=new \Carbon\Carbon(str_replace('/','-',$xml->proyecto->descripcion->fecha_ingreso));
                    $e->camara_origen=$xml->proyecto->descripcion->camara_origen;
                    $e->etapa=$xml->proyecto->descripcion->etapa;
                    $e->subetapa=$xml->proyecto->descripcion->subetapa;
                    $e->iniciativa=$xml->proyecto->descripcion->iniciativa;
                    $e->urgencia_actual=$xml->proyecto->descripcion->urgencia_actual;

                    $e->save();
                    $this->info('Ok');
                }else{
                    $this->error('No se encontró Ley');
                }

            }catch (Exception $e){
                $this->error($e->getMessage());
            }

        }
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}
