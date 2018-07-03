<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
       $this->middleware('auth', ['except' => ['index']]);
       $this->middleware('experto', ['except' => ['index']]);
    }

    public function index()
    {
      $faqs = Faq::orderBy('question','asc')->paginate(25);
      return view('faqs.index')->with('faqs', $faqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Validation
      $this->validate($request,[
        'question' => 'required',
        'answer' => 'required',
      ],[
        'question.required' => 'La pregunta es requerida',
        'answer.required' => 'La respuesta es requerida',
      ]);

      //Create Faq

      $faq = new Faq;
      $faq->question = $request->input('question');
      $faq->answer = $request->input('answer');

      //Save
      $faq->save();

      return redirect('faqs')->with('success','La pregunta se ha creado exitosamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
      return view('faqs.edit')->with('faq', $faq);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
      //Validation
      $this->validate($request,[
        'question' => 'required',
        'answer' => 'required',
      ],[
        'question.required' => 'La pregunta es requerida',
        'answer.required' => 'La respuesta es requerida',
      ]);

      $faq->question = $request->input('question');
      $faq->answer = $request->input('answer');

      //Save
      $faq->save();

      return redirect('/faqs')->with('success', 'La pregunta se ha modificado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
      $faq->delete();

      return redirect('/faqs')->with('success', 'La pregunta frecuente ha sido eliminada.');
    }
}
