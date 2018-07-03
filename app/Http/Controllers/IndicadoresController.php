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
        $indicadores = Indicador::orderBy('nombre','asc')->paginate(25);
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
        return redirect("/indicadores")->with('success', 'El indicador se ha creado exitosamente.');
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
        return redirect("/indicadores")->with('success', 'El indicador se ha modificado exitosamente.');
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
        return redirect('/indicadores')->with('success', 'El indicador se ha eliminado.');
    }

    public function storePreguntas($cuest_id, $pregunta_id, Request $request)
    {
        $validations = [
            "indicador_id" => "required",
            "required" => "required",
            "order" => "required",
        ];
        $messages = [
            "order.required" => "La posición de la pregunta es requerida",
        ];

        //Check dimension_indicador
        $indicadorDimension = IndicadoresDimensiones::where('indicador_id', '=', $request->indicador_id)
        ->where('cuestionario_id', '=', $cuest_id)
        ->first();

        $this->validate($request, $validations, $messages);
        $required = $request->required === 'true';
        $indicador_id = $request->indicador_id;
        $order = $request->order;

        $indicadorPregunta = new IndicadoresPreguntas();
        $indicadorPregunta->order = $order;
        $indicadorPregunta->pregunta_id = $pregunta_id;
        $indicadorPregunta->indicador_id = $indicador_id;
        $indicadorPregunta->cuestionario_id = $cuest_id;
        $indicadorPregunta->dimension_indicador_id = $indicadorDimension->id;
        $indicadorPregunta->required = $required;
        $indicadorPregunta->save();
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
