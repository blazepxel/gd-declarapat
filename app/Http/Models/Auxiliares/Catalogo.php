<?php namespace App\Http\Models\Auxiliares;

use Illuminate\Database\Eloquent\Model;


class catalogo extends Model
{

  public function ambitos()
  {
    $array = \DB::connection('catalogos')->table('ambitos')
                                         ->orderby('ambito','ASC')
                                         ->get();
    return $array;
  }





  public function poderes()
  {
    $array = \DB::connection('catalogos')->table('poderes')
                                         ->orderby('poder','ASC')
                                         ->get();
    return $array;
  }





  public function misdependencias()
  {  
    $array = \DB::connection('catalogos')->table('misdependencias')
                                         ->orderby('dependencia','ASC')
                                         ->get();
    return $array;
  }





  public function parentescos()
  {
    $array = \DB::connection('catalogos')->table('parentescos')
                                         ->orderby('parentesco','ASC')
                                         ->get();
    return $array;
  }





  public function sectores()
  {
    $array = \DB::connection('catalogos')->table('sectores')
                                         ->orderby('sector','ASC')
                                         ->get();
    return $array;
  }





  public function estado_civil()
  {
    $array = \DB::connection('catalogos')->table('estados_civiles')
                                         ->orderby('estado','ASC')
                                         ->get();
    return $array;
  }





  public function regimen_matrimonial()
  {
    $array = \DB::connection('catalogos')->table('regimenes_matrimoniales')
                                         ->orderby('regimen','ASC')
                                         ->get();
    return $array;
  }





  public function paises($excepto = null)
  {
    $array = \DB::connection('catalogos')->table('paises')
                                         ->where('pais','!=',$excepto)
                                         ->orderby('pais','ASC')
                                         ->get();
    return $array;
  }





  public function nacionalidades()
  {
    $array = \DB::connection('catalogos')->table('nacionalidades')
                                         ->orderby('nacionalidad','ASC')
                                         ->get();
    return $array;
  }



  public function formas_adquisicion()
  {
    $array = \DB::connection('catalogos')->table('formas_adquisicion')
                                         ->orderby('forma','ASC')
                                         ->get();
    return $array;
  }





  public function especifica_relacion()
  {
    $array = \DB::connection('catalogos')->table('tipo_relaciones')
                                         ->orderby('tipo','ASC')
                                         ->get();
    return $array;
  }

  


  
  public function tipos_bienes()
  {
    $array = \DB::connection('catalogos')->table('tipos_bienes')
                                         ->orderby('tipo','ASC')
                                         ->get();
    return $array;
  }





  public function tipos_obra()
  {
    $array = \DB::connection('catalogos')->table('tipos_obras')
                                         ->orderby('tipo','ASC')
                                         ->get();
    return $array;
  }





  public function estados()
  {
    $array = \DB::connection('catalogos')->table('estados')
                                         ->orderby('estado','ASC')
                                         ->get();
    return $array;
  }





  public static function estado($id)
  {
    $array = \DB::connection('catalogos')->table('estados')
                                         ->select('estado')
                                         ->where('id','=',$id)
                                         ->first();
    if($array)
    {
      return $array->estado;
    }
    else
    {
      return "NO ESPECIFICADO";
    }
  }





  public static function estado_id($estado)
  {
    $array = \DB::connection('catalogos')->table('estados')
                                         ->select('id')
                                         ->where('estado','=',$estado)
                                         ->first();
    if($array)
    {
      return $array->id;
    }
    else
    {
      return null;
    }
  }





  public static function municipios($estado_id)
  {
    $array = \DB::connection('catalogos')->table('municipios')
                                         ->select('municipio')
                                         ->where('id_estado','=',$estado_id)
                                         ->orderby('municipio','ASC')
                                         ->get();

    $decode = json_decode(json_encode($array), true);

    foreach($decode as $municipio)
    {
      $resultado[]= $municipio['municipio'];
    }

    return $resultado;
  }





  public static function tipo_inversion_especifica($inversion)
  {
    $array = \DB::connection('catalogos')->table('tipo_inversion')
                                         ->select('tipo')
                                         ->where('id_inversion','=',$inversion)
                                         ->orderby('tipo','ASC')
                                         ->get();

    $decode = json_decode(json_encode($array), true);

    foreach($decode as $tipo)
    {
      $resultado[]= $tipo['tipo'];
    }

    return $resultado;
  }





  public static function tipo_inversion($id)
  {
    $array = \DB::connection('catalogos')->table('inversiones')
                                         ->select('inversion')
                                         ->where('id','=',$id)
                                         ->first();
    return $array->inversion;
  }





  public function nivel_escolar()
  {
    $array = \DB::connection('catalogos')->table('nivel_escolar')
                                         ->get();
    return $array;
  }





  public static function niveles_educativos()
  {
    $array = \DB::connection('catalogos')->table('niveles_academicos')
                                         ->orderby('id','ASC')
                                         ->get();
    return $array;
  }





  public static function nivel_educativo($id)
  {
    $array = \DB::connection('catalogos')->table('niveles_academicos')
                                         ->where('id','=',$id)
                                         ->first();
    return $array->nivel;
  }





  public static function nivel_educativo_id($nivel)
  {
    $array = \DB::connection('catalogos')->table('niveles_academicos')
                                         ->where('nivel','=',$nivel)
                                         ->first();
    return $array->id;
  }





  public static function estatus_escolaridad()
  {
    $array = \DB::connection('catalogos')->table('estatus_escolaridad')
                                         ->orderby('estatus','ASC')
                                         ->get();
    return $array;
  }





  public static function inversiones()
  {
    $array = \DB::connection('catalogos')->table('inversiones')
                                         ->orderby('inversion','ASC')
                                         ->get();
    return $array;
  }

  



  public static function titulares()
  {
    $array = \DB::connection('catalogos')->table('titulares')
                                         ->orderby('titular','ASC')
                                         ->get();
    return $array;
  }





  public static function periodos()
  {
    $array = \DB::connection('catalogos')->table('periodos')
                                         ->orderby('id','ASC')
                                         ->get();
    return $array;
  }





  public static function documento_obtenido($nivel)
  {
    if($nivel > 3)
    {
      $array = \DB::connection('catalogos')->table('documentos_obtenidos')
                                           ->orderby('documento','ASC')
                                           ->get();
    }
    else
    {
      $array = \DB::connection('catalogos')->table('documentos_obtenidos')
                                           ->where('documento','!=','TITULO')
                                           ->orderby('documento','ASC')
                                           ->get();
    }

    $decode = json_decode(json_encode($array), true);

    foreach($decode as $doc)
    {
      $resultado[]= $doc['documento'];
    }

    return $resultado;
  }





  public static function formatos_declarapat($ley = 'l17')
  {
    $array = \DB::connection('catalogos')->table('formatos_declarapat')
                                         ->where('ley','=',$ley)
                                         ->orderby('id','ASC')
                                         ->get();
    return $array;
  }





  public static function formato_declarapat($id)
  {
    if(is_numeric($id))
    {
      $array = \DB::connection('catalogos')->table('formatos_declarapat')
                                           ->where('id','=',$id)
                                           ->first();
    }
    else
    {
      $array = \DB::connection('catalogos')->table('formatos_declarapat')
                                           ->where('slug','=',$id)
                                           ->first();
    }

    return $array;
  }
}
