<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Http\Models\Auxiliares\Crear;
use App\Http\Models\Declaracion;
use App\Http\Models\Usuario;


class PanelController extends Controller
{

  public function index()
  {
    Crear::bd();

    if(\Auth::check())
	  {
      $declaraciones = Declaracion::where('rfc','=',\Auth::user()->rfc)->orderBy('created_at','DESC')
                                                                       ->get();

      $activas       = Declaracion::where('rfc','=',\Auth::user()->rfc)->where('fecha_sello','<',1)
                                                                       ->orderBy('created_at','DESC')
                                                                       ->count();

      if(\Auth::user()->rfc == "MODO-DIOS")
      {
        $declarantes = Usuario::where('rfc','!=','MODO-DIOS')->orderBy('rol','ASC')->orderBy('rfc','DESC')->get();
      }
      else
      {
        $declarantes = Usuario::where('rfc','!=','MODO-DIOS')->where('rol','!=','administrador')->orderBy('rfc','DESC')->get();
      }

      $no = 1;

      return view('panel.'.\Auth::user()->rol)->with('declaraciones',$declaraciones)
                                              ->with('activas',$activas)
                                              ->with('declarantes',$declarantes)
                                              ->with('no',$no);
	  }
	  else
	  {
      return view('landing.index');
	  }
  }

}
