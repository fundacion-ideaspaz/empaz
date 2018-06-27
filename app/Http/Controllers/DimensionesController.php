<?php

namespace App\Http\Controllers;

use App\Dimension;
use App\DimensionCuestionario;
use App\Enunciado;
use App\IndicadoresDimensiones;
use Illuminate\Http\Request;
use Storage;

class DimensionesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'experto']);
    }

    public function index()
    {
        $dimensiones = Dimension::orderBy('nombre','asc')->paginate(25);
        return view("dimensiones.index")->with(["dimensiones" => $dimensiones]);
    }

    public function create()
    {
        return view("dimensiones.create");
    }

    public function store(Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "enunciados" => "required|array",
            "enunciados.*" => "required",
            "estado" => "required",
        ];
        $messages = array(
            'descripcion.required' => 'El campo descripción es requerido.',
            'enunciados.0.required' => 'El campo de enunciado bajo es requerido.',
            'enunciados.1.required' => 'El campo de enunciado medio bajo es requerido.',
            'enunciados.2.required' => 'El campo de enunciado medio es requerido.',
            'enunciados.3.required' => 'El campo de enunciado medio alto es requerido.',
            'enunciados.4.required' => 'El campo de enunciado alto es requerido.',
        );
        $this->validate($request, $validations, $messages);
        $inputs = $request->all();
        $enunciados = [
            "bajo" => $inputs["enunciados"][0],
            "medio bajo" => $inputs["enunciados"][1],
            "medio" => $inputs["enunciados"][2],
            "medio alto" => $inputs["enunciados"][3],
            "alto" => $inputs["enunciados"][4],
        ];
        $dimension = Dimension::create($inputs);
        foreach ($enunciados as $nivel_importancia => $enunciado) {
            $new_enunciado = Enunciado::create([
                "nivel_importancia" => $nivel_importancia,
                "descripcion" => $enunciado,
                "dimension_id" => $dimension->id,
            ]);
        }
        return redirect("/dimensiones");
    }

    public function edit($id)
    {
        $dimension = Dimension::find($id);
        $enunciados = Enunciado::where("dimension_id", "=", $dimension->id)->get();
        $dimensionCuestionario = DimensionCuestionario
            ::where('dimension_id', '=', $dimension->id)
            ->first();
        $canEditEstado = true;
        if ($dimensionCuestionario) {
            $canEditEstado = false;
        }
        return view("dimensiones.edit")->with([
            "dimension" => $dimension,
            "enunciados" => $enunciados,
            "canEditEstado" => $canEditEstado,
        ]);
    }

    public function update($id, Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "enunciados" => "required|array",
            "enunciados.*" => "required",
        ];
        $messages = array(
            'descripcion.required' => 'El campo descripción es requerido.',
            'enunciados.0.required' => 'El campo de enunciado bajo es requerido.',
            'enunciados.1.required' => 'El campo de enunciado medio bajo es requerido.',
            'enunciados.2.required' => 'El campo de enunciado medio es requerido.',
            'enunciados.3.required' => 'El campo de enunciado medio alto es requerido.',
            'enunciados.4.required' => 'El campo de enunciado alto es requerido.',
        );
        $this->validate($request, $validations, $messages);
        $dimension = Dimension::find($id);
        $inputs = $request->all();
        $enunciados = [
            "bajo" => $inputs["enunciados"][0],
            "medio bajo" => $inputs["enunciados"][1],
            "medio" => $inputs["enunciados"][2],
            "medio alto" => $inputs["enunciados"][3],
            "alto" => $inputs["enunciados"][4],
        ];
        $dimension->update($inputs);
        $dimension->save();
        foreach ($enunciados as $nivel_importancia => $enunciado) {
            $newEnunciado = Enunciado::where("dimension_id", "=", $dimension->id)
                ->where("nivel_importancia", "=", $nivel_importancia)->first();
            $newEnunciado->descripcion = $enunciado;
            $newEnunciado->save();
        }
        return redirect("/dimensiones");
    }

    public function show($id)
    {
        return redirect("/dimensiones/" . $id . "/edit");
    }

    public function delete($id, Request $request)
    {
        $dimensionesCuest = DimensionCuestionario
            ::where("dimension_id", "=", $id)->get();
        if ($dimensionesCuest->count() > 0) {
            return view("dimensiones.delete")->with([
                "id" => $id,
                "can_delete" => false,
            ]);
        }
        return view("dimensiones.delete")->with([
            "id" => $id,
            "can_delete" => true,
        ]);
    }

    public function deleteConfirm($id, Request $request)
    {
        $dimension = Dimension::find($id);
        $dimension->delete();
        return redirect('/dimensiones');
    }

    public function storeIndicadores($cuest_id, $indicador_id, Request $request)
    {
        $validations = [
            "nivel_importancia" => "required",
            "dimension_id" => "required",
        ];

        $this->validate($request, $validations);

        //Check cuestionario_dimension
        $dimensionCuestionario = DimensionCuestionario::where('dimension_id', '=', $request->dimension_id)
        ->where('cuestionario_id', '=', $cuest_id)->first();


        $importancia = $request->nivel_importancia;
        $dimension_id = $request->dimension_id;
        $dimensionIndicador = new IndicadoresDimensiones();
        $dimensionIndicador->indicador_id = $indicador_id;
        $dimensionIndicador->dimension_id = $dimension_id;
        $dimensionIndicador->cuestionario_id = $cuest_id;
        $dimensionIndicador->nivel_importancia = $importancia;
        $dimensionIndicador->cuestionario_dimension_id = $dimensionCuestionario->id;
        $dimensionIndicador->save();
        return redirect("/cuestionarios/" . $cuest_id . "/indicadores");
    }

    public function deleteIndicadores($id, $indicador_id, Request $request)
    {
        $dimensionCuestionario = IndicadoresDimensiones
            ::where("dimension_id", "=", $id)
            ->where("indicador_id", "=", $indicador_id)->first();
        $dimensionCuestionario->delete();
        $cuestionario_id = $request->cuestionario_id;
        return redirect("/cuestionarios/" . $cuestionario_id . "/indicadores");
    }
}
