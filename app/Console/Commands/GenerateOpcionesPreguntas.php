<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Pregunta;
use App\OpcionesRespuestas;


class GenerateOpcionesPreguntas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'preguntas:generate-opciones';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle()
    {
        $preguntas = Pregunta::all();
        foreach($preguntas as $pregunta){
            $found = false;
            foreach($pregunta->opcionesRespuestas as $opcion){
                if($opcion->descripcion == "No aplica" || $opcion->descripcion == "No hay información"){
                    $found = true;
                    break;
                }
            }
            if(!$found){
                $newRespuesta = new OpcionesRespuestas();
                $newRespuesta->number = $pregunta->opcionesRespuestas->count()+1;
                $newRespuesta->pregunta_id = $pregunta->id;
                $newRespuesta->descripcion = "No aplica";
                $newRespuesta->save();

                $newRespuesta = new OpcionesRespuestas();
                $newRespuesta->number = $pregunta->opcionesRespuestas->count()+1;
                $newRespuesta->pregunta_id = $pregunta->id;
                $newRespuesta->descripcion = "No hay información";
                $newRespuesta->save();
            }
        }
    }
}
