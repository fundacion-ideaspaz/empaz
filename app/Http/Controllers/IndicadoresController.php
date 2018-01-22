<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicador;
use App\Pregunta;
use App\IndicadoresDimensiones;
use App\IndicadoresPreguntas;
use Storage;

class IndicadoresController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'experto']);
    }

    public function index()
    {
        $indicadores = Indicador::all();
        return view("indicadores.index")->with([
            "indicadores" => $indicadores
        ]);
    }

    public function create()
    {
        return view("indicadores.create");
    }

    public function store(Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "estado" => "required"
        ];
        $messages = array(
            'descripcion.required' => 'El campo descripción es requerido.',
        );
        $this->validate($request, $validations, $messages);
        $inputs = $request->all();
        $indicador = Indicador::create($inputs);
        return redirect("/indicadores");
    }

    public function edit($id)
    {
        $indicador = Indicador::find($id);
        $indicadorDimension = IndicadoresDimensiones
            ::where('indicador_id', '=', $indicador->id)
            ->first();
        $canEditEstado = true;
        if ($indicadorDimension) {
            $canEditEstado = false;
        }
        return view("indicadores.edit")->with([
            "indicador" => $indicador,
            "canEditEstado" => $canEditEstado,
        ]);
    }

    public function update($id, Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "estado" => "required"
        ];
        $messages = array(
            'descripcion.required' => 'El campo descripción es requerido.',
        );
        $this->validate($request, $validations, $messages);
        $inputs = $request->all();
        $indicador = Indicador::find($id);
        $indicador->update($inputs);
        $indicador->save();
        return redirect("/indicadores");
    }

    public function show($id)
    {
        return redirect("/indicadores/".$id."/edit");
    }

    public function delete($id, Request $request)
    {
        $indicadoresCuest = IndicadoresDimensiones
                        ::where("indicador_id", "=", $id)->get();
        if($indicadoresCuest->count() > 0){
            return view("indicadores.delete")->with([
                "id" => $id,
                "can_delete" => false
            ]);
        }
        return view("indicadores.delete")->with([
            "id" => $id,
            "can_delete" => true
        ]);
    }

    public function deleteConfirm($id, Request $request)
    {
        $indicador = Indicador::find($id);
        $indicador->delete();
        return redirect('/indicadores');
    }

    public function storePreguntas($cuest_id, $pregunta_id, Request $request)
    {
        $validations = [
            "indicador_id" => "required",
            "required" => "required"
        ];
        $this->validate($request, $validations);
        $required = $request->required === 'true';
        $indicador_id = $request->indicador_id;
        $indicadorCuestionario = new IndicadoresPreguntas();
        $indicadorCuestionario->pregunta_id = $pregunta_id;
        $indicadorCuestionario->indicador_id = $indicador_id;
        $indicadorCuestionario->cuestionario_id = $cuest_id;
        $indicadorCuestionario->required = $required;
        $indicadorCuestionario->save();
        return redirect("/cuestionarios/".$cuest_id."/preguntas");
    }

    public function deletePreguntas($id, $pregunta_id, Request $request)
    {
        $indicadorCuestionario = IndicadoresPreguntas
            ::where("indicador_id", "=", $id)
            ->where("pregunta_id", "=", $pregunta_id)->first();
        $indicadorCuestionario->delete();
        $cuestionario_id = $request->cuestionario_id;
        return redirect("/cuestionarios/".$cuestionario_id."/preguntas");
    }
}
