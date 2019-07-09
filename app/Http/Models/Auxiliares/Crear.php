<?php namespace App\Http\Models\Auxiliares;

use App\Http\Models\Usuario;
use App\Http\Models\Auxiliares\Catalogo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;


class Crear
{

  public static function bd()
  {
    /////////////////////////////////////////////////////////////////////////////////
    /////////////////////// CREAR TABLA DE USUARIOS
    /////////////////////////////////////////////////////////////////////////////////

    $usuario = new Usuario;
    $usuario->Tabla();

    $configuracion = new \App\Http\Models\Configuracion;
    $configuracion->Tabla();

    $declaracion = new \App\Http\Models\Declaracion;
    $declaracion->Tabla();

    $declaracion_formato = new \App\Http\Models\Declaracion_Formato;
    $declaracion_formato->Tabla();

    $formatos = Catalogo::formatos_declarapat();

    foreach($formatos as $formato)
    {
      $modelo = "\App\Http\Models\Formatos\\".$formato->ley."_".$formato->slug;

      $modelo = new $modelo;
      $modelo->Tabla();
    }


  }

}
