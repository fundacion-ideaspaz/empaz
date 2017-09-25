<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Indicador;
use Storage;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'experto']);
    }

    public function index()
    {
        $questions = Question::all();
        return view("questions.index")->with([
            "questions" => $questions
        ]);
    }

    public function create()
    {
        $indicadores = Indicador::all();
        return view("questions.create")->with(["indicadores" => $indicadores]);
    }

    public function store(Request $request)
    {
        $validations = [
            "texto" => "required",
            "descripcion" => "required",
            "tipo_respuesta" => "required",
            "indicadores" => "required|array"
        ];
        $this->validate($request, $validations);
        $inputs = $request->all();
        $question = Question::create($inputs);
        return redirect("/questions");
    }

    public function edit($id)
    {
        $question = Question::find($id);
        $indicadores = [];
        foreach ($question->indicadores as $indicador) {
            $indicador_obj = Indicador::find($indicador);
            array_push($indicadores, $indicador_obj);
        }
        $restIndicadores = Question::whereNotIn("_id", $question->indicadores)->get();
        return view("question.edit")->with([
            "question" => $question,
            "indicadores" => $indicadores,
            "restIndicadores" => $restIndicadores
        ]);
    }

    public function update($id, Request $request)
    {
        $validations = [
            "texto" => "required",
            "descripcion" => "required",
            "tipo_respuesta" => "required",
            "indicadores" => "required|array"
        ];
        $this->validate($request, $validations);
        $inputs = $request->all();
        $question = Question::find($id);
        $question->update($inputs);
        $question->save();
        return redirect("/questions");
    }

    public function show($id)
    {
        return redirect("/questions/".$id."/edit");
    }

    public function delete($id, Request $request)
    {
        return view("questions.delete")->with(["id" => $id]);
    }

    public function deleteConfirm($id, Request $request)
    {
        $question = QuestionController::find($id);
        $question->delete();
        return redirect('/questions');
    }
}
