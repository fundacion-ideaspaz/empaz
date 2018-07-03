<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuestionario;
use App\Dimension;
use App\DimensionCuestionario;
use App\IndicadoresDimensiones;
use App\IndicadoresPreguntas;
use App\CuestionarioResult;

class CuestionariosController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'experto']);
    }

    public function index()
    {
        $cuestionarios = Cuestionario::orderBy("cuest_id_parent", "ASC")->get();
        return view("cuestionarios.index")->with([
            "cuestionarios" => $cuestionarios
        ]);
    }

    public function create()
    {
        return view("cuestionarios.create");
    }

    public function store(Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "estado" => "required",
            "version" => "required|integer"
        ];
        $messages = array(
            'descripcion.required' => 'El campo descripción es requerido.',
        );
        $this->validate($request, $validations, $messages);
        $preguntas = $request["preguntas"];
        $cuestionario = $request->except('preguntas');
        $newCuestionario = Cuestionario::create($cuestionario);
        $newCuestionario->cuest_id_parent = $newCuestionario->id;
        $newCuestionario->save();
        return redirect("/cuestionarios/".$newCuestionario->id."/dimensiones");
    }

    public function edit($id)
    {
        //Check if can be edited
        $cuestionario = Cuestionario::find($id);

        $cuestionario_result = CuestionarioResult::where('cuestionario_id', $id)->first();
        $canEditEstado = true;
        if ($cuestionario_result) {
            $canEditEstado = false;
        }

        //Find cuestionario

        $lastCuest = Cuestionario
                ::where("cuest_id_parent", "=", $cuestionario->cuest_id_parent)
                ->orderBy("version", "DESC")->first();
        if($cuestionario->id == $lastCuest->id){
            $view = "cuestionarios.edit-total";
        }else{
            $view = "cuestionarios.edit";
        }

        return view($view)->with([
            "cuestionario" => $cuestionario,
            "canEditEstado" => $canEditEstado,
        ]);
    }

    public function update($id, Request $request)
    {
        $validations = [
            "descripcion" => "required",
            "estado" => "required"
        ];
        $messages = array(
            'descripcion.required' => 'El campo descripción es requerido.',
        );
        $this->validate($request, $validations, $messages);
        $inputs = $request->only(["descripcion", "estado"]);
        $cuestionario = Cuestionario::find($id);
        $cuestionario->update($inputs);
        $cuestionario->save();
        return redirect("/cuestionarios/".$cuestionario->id."/dimensiones");
    }

    public function getCopy($id)
    {
        $cuestionario = Cuestionario::find($id);
        return view("cuestionarios.copy")->with([
            "cuestionario" => $cuestionario
        ]);
    }


    public function postCopy($id, Request $request)
    {
        $fromVersion = $request->type === 'true';
        $cuestionario = Cuestionario::find($id);
        $cuestionarioCopy = new Cuestionario($cuestionario->toArray());
        $lastVersion = Cuestionario
            ::where('cuest_id_parent', '=', $cuestionario->cuest_id_parent)
            ->latest()->first();
        $cuestionarioCopy->version = (int)$lastVersion->version+1;
        $cuestionarioCopy->save();
        if($fromVersion){
            //Create dimensiones
            $dimensionesCuestionario = DimensionCuestionario
                ::where("cuestionario_id", "=", $id)->get();
            foreach($dimensionesCuestionario as $dimCuest){
                $dimCuest->cuestionario_id = $cuestionarioCopy->id;
                $newDimCuest = DimensionCuestionario::create($dimCuest->toArray());
            }
            //Create indicadores
            $indicadoresDimensiones = IndicadoresDimensiones
                ::where("cuestionario_id", "=", $id)->get();
            foreach($indicadoresDimensiones as $dimIndicador){
                //Change cuestionario_id for new cuestionario
                $dimIndicador->cuestionario_id = $cuestionarioCopy->id;
                //Change cuestionario_dimension_id for new cuestionario
                $cuestionario_dimension_id = DimensionCuestionario::
                  where('cuestionario_id', '=', $cuestionarioCopy->id)
                  ->where('dimension_id', '=', $dimIndicador->dimension_id)->first()->id;
                $dimIndicador->cuestionario_dimension_id = $cuestionario_dimension_id;
                $newDimCuest = IndicadoresDimensiones::create($dimIndicador->toArray());
            }
            //Create preguntas
            $indicadoresPreguntas = IndicadoresPreguntas
                ::where("cuestionario_id", "=", $id)->get();
            foreach($indicadoresPreguntas as $indPreg){
              //Change cuestionario_id for new cuestionario
                $indPreg->cuestionario_id = $cuestionarioCopy->id;
                //CHange dimension_indicador_id for cuestionario
                $dimension_indicador_id = IndicadoresDimensiones::
                  where('cuestionario_id', '=', $cuestionarioCopy->id)
                  ->where('indicador_id', '=', $indPreg->indicador_id)->first()->id;
                $indPreg->dimension_indicador_id = $dimension_indicador_id;
                $newDimCuest = IndicadoresPreguntas::create($indPreg->toArray());
            }
        }
        return redirect("/cuestionarios")->with('success', 'La copia del cuestionario se ha creado exitosamente.');
    }

    public function delete($id, Request $request)
    {
        return view("cuestionarios.delete")->with(["id" => $id]);
    }

    public function deleteConfirm($id, Request $request)
    {
        $cuestionario = Cuestionario::find($id);
        $cuestionario->delete();
        return redirect('/cuestionarios')->with('success', 'El cuestionario ha sido eliminado.');
    }

    public function storeDimensiones($id, $dimension_id, Request $request)
    {
        $validations = [
            "importancia" => "required"
        ];
        $this->validate($request, $validations);
        $importancia = $request->importancia;
        $importancias = DimensionCuestionario
            ::where("cuestionario_id", "=", $id)
            ->pluck("importancia");
        $importanciaTotal = 0;
        foreach($importancias as $imp){
            $importanciaTotal += $imp;
        }
        if($importanciaTotal + $importancia > 100){
            return redirect("/cuestionarios/".$id."/dimensiones")->withErrors([
                "errors" => "La suma de la importancia de las dimensiones debe ser igual a 100%"
            ]);
        }
        $dimensionCuestionario = new DimensionCuestionario();
        $dimensionCuestionario->cuestionario_id = $id;
        $dimensionCuestionario->dimension_id = $dimension_id;
        $dimensionCuestionario->importancia = $importancia;
        $dimensionCuestionario->save();
        return redirect("/cuestionarios/".$id."/dimensiones");
    }

    public function deleteDimensiones($id, $dimension_id, Request $request)
    {
        $dimensionCuestionario = DimensionCuestionario
            ::where("cuestionario_id", "=", $id)
            ->where("dimension_id", "=", $dimension_id)->first();
        $dimensionCuestionario->delete();
        return redirect("/cuestionarios/".$id."/dimensiones");
    }
}
