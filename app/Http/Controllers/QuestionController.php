<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{

  public function index(){
      $questions = Question::all();
      return view('question.index')->with(['questions' => $questions]);
  }

    public function create(){
        return view('question.create');
    }

    public function store(Request $request){
        $request->validate([
            'texto' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'tiporespuesta' => 'required|max:255',
            'textorespuesta' => 'required|max:255',
        ]);
        $inputs = $request->only('texto', 'descripcion', 'tipoderespuesta', 'textorespuesta');
        $question = Question::create($inputs);
        return redirect("/question");
    }
}
