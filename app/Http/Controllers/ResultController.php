<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuestionario;
use App\CuestionarioResult;
use App\RespuestaCuestionario;
use Auth;

class ResultController extends Controller {

    public function index() {
        $id = Auth::user()->id;
        
        $cuestionarios_result = CuestionarioResult::where("user_id", '=',  $id)->get();     
        
         return view("result.index")->with([
            "cuestionarios_result" => $cuestionarios_result
        ]);
    }


}
