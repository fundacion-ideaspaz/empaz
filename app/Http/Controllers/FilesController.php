<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{

    public function __construct(){
       $this->middleware('auth', ['except' => ['index']]);
       $this->middleware('experto', ['except' => ['index']]);
    }

    public function index(){
      return view('files.index');
    }

    public function store(Request $request){
      // Validation
      $this->validate($request, [
        'manual_file' => 'required',
        'tc_file' => 'required',
      ],[
        'manual_file.required' => 'El manual es requerido.',
        'tc_file.required' => 'El documento de términos y condiciones es requerido.'
      ]);

      //Move manual file
      $manual = $request->file('manual_file');
      $manual->move('pdfs', 'ManualEMPAZ.pdf');

      //Move terms and conditions file
      $tc = $request->file('tc_file');
      $tc->move('pdfs', 'TerminosCondicionesEMPAZ.pdf');

      return redirect('files')->with('success','Los archivos han sido cargados exitosamente.');
    }
}
