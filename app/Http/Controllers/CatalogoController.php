<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Http\Models\Auxiliares\Catalogo;


class CatalogoController extends Controller
{
    

  public function __construct()
  {
      $this->middleware('auth');
  }





  public function getMunicipios(Request $request, $estado_id = null){

    if($estado_id > 0)
    {
      $municipios = Catalogo::municipios($estado_id);
    }
    else
    {
      $municipios = [];
    }

    if($request->ajax())
    {
      return response()->json($municipios);
    }
  }///public function





  public function getTipoinversionespecifica(Request $request, $tipo_id = null){

    if($tipo_id > 0)
    {
      $tipos = Catalogo::tipo_inversion_especifica($tipo_id);
    }
    else
    {
      $tipos = [];
    }

    if($request->ajax())
    {
      return response()->json($tipos);
    }
  }///public function





  public function getDocumentos(Request $request, $nivel_id = null){

    if($nivel_id > 0)
    {
      $array = Catalogo::documento_obtenido($nivel_id);
    }
    else
    {
      $array = [];
    }

    if($request->ajax())
    {
      return response()->json($array);
    }
  }///public function
}
