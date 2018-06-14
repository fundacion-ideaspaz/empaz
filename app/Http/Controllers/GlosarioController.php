<?php

namespace App\Http\Controllers;

use App\TerminoGlosario;
use Illuminate\Http\Request;

class GlosarioController extends Controller
{

      public function __construct(){
         $this->middleware('auth', ['except' => ['index']]);
         $this->middleware('experto', ['except' => ['index']]);
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $terminos = TerminoGlosario::orderBy('keyword','asc')->get();
       return view('glosario.index')->with('terminos', $terminos);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         return view('glosario.create');
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
         'keyword' => 'required',
         'meaning' => 'required',
       ]);

       //Create Term

       $terminoGlosario = new TerminoGlosario;
       $terminoGlosario->keyword = $request->input('keyword');
       $terminoGlosario->meaning = $request->input('meaning');

       //Save
       $terminoGlosario->save();

       return redirect('glosario')->with('success','La entrada fue creada satisfactoriamente.');

     }

    /**
     * Display the specified resource.
     *
     * @param  \App\TerminoGlosario  $terminoGlosario
     * @return \Illuminate\Http\Response
     */
      public function show(TerminoGlosario $terminoGlosario)
      {
          return $terminoGlosario;
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TerminoGlosario  $terminoGlosario
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
     {
       $terminoGlosario = TerminoGlosario::find($id);
       return view('glosario.edit')->with('terminoGlosario', $terminoGlosario);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TerminoGlosario  $terminoGlosario
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
     {
       $terminoGlosario = TerminoGlosario::find($id);
       $terminoGlosario->keyword = $request->input('keyword');
       $terminoGlosario->meaning = $request->input('meaning');

       //Save
       $terminoGlosario->save();

       return redirect('/glosario')->with('success', 'La entrada fue modificada exitosamente.');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TerminoGlosario  $terminoGlosario
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
       $terminoGlosario = TerminoGlosario::find($id);
       $terminoGlosario->delete();
       return redirect('/glosario')->with('success', 'La entrada fue eliminada.');
     }
}
