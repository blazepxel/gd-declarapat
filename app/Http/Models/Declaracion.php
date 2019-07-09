<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use App\Http\Models\Auxiliares\Texto;
use App\Http\Models\Auxiliares\Catalogo;
use App\Http\Models\Declaracion_Formato;


class Declaracion extends Model
{
  protected $table = 'declaraciones';

  protected $fillable = ['rfc','tipo','ley'];

  protected $hidden = ['password', 'remember_token',];

  ////////////////////////////////////////
  /////////// GETTERS
  ////////////////////////////////////////
  public function getlimiteAttribute()
  {
    return "31/May";
  }





  public function getformatosAttribute()
  {
    $formatos = Declaracion_Formato::where('declaracion_id','=',$this->id)->orderby('formato_id','ASC')
                                                                          ->get();

    foreach($formatos as $formato)
    {
      $activo = Catalogo::formato_declarapat($formato->formato_id);

      if($activo->activo == 1)
      {
        $array[] = $formato;
      }
    }

    return $array;
  }



  public function getEstatusAttribute()
  {
    if($this->fecha_sello != 1)
    {
        $completados = Declaracion_Formato::where('declaracion_id','=',$this->id)->where('estatus','=',1)
                                                                                ->count();

        $total = Declaracion_Formato::where('declaracion_id','=',$this->id)->count();

        $res = round(($completados*100)/$total);

        if($res == 0)
        {
          $color = "danger";
          $avance = "Sin Iniciar - ".$completados." de ".$total;
          $colorear = 100;
        }
        elseif($res == 100)
        {
          $color = "warning";
          $avance = "Completado - ".$completados." de ".$total;
          $colorear = 100;
        }
        else
        {
          $color = "warning";
          $avance = " ".$res."% - ".$completados." de ".$total;
          $colorear = $res;
        }

        $progress =
          "<div class='progress'>".
            "<div class='progress-bar progress-bar-".$color." progress-bar-striped' role='progressbar' aria-valuenow='".$colorear."' aria-valuemin='0' aria-valuemax='100' style='min-width: 2em; width: ".$colorear."%;'>
                ".$avance."
            </div>
          </div>";
    }
    else
    {
      $res = 100;
      $color = "success";
      $colorear = 100;
      $avance = "Firmado y Enviado"; 
      $progress =
      "<div class='progress'>".
        "<div class='progress-bar progress-bar-".$color." progress-bar-striped' role='progressbar' aria-valuenow='".$colorear."' aria-valuemin='0' aria-valuemax='100' style='min-width: 2em; width: ".$colorear."%;'>
            ".$avance."
        </div>
      </div>";
    }

    $array['view']    = $progress;
    $array['estatus'] = $color;
    $array['avance']  = $res;

    return $array;
  }



  public function getContinuarAttribute()
  {
    $pendiente = Declaracion_Formato::where('declaracion_id','=',$this->id)->where('estatus','=',0)
                                                                           ->orderby('formato_id','ASC')
                                                                           ->first();
    $formato = Catalogo::formato_declarapat($pendiente->formato_id);

    return $formato->slug;
  }

  ////////////////////////////////////////
  /////////// METODOS
  ////////////////////////////////////////
  public function crear_formatos()
  {
    $formatos = Catalogo::formatos_declarapat($this->ley);

    foreach($formatos as $formato)
    {
      Declaracion_Formato::create(['formato_id' => $formato->id, 'declaracion_id' => $this->id]);

      \DB::table($formato->ley."_".$formato->slug)->insert(['declaracion_id' => $this->id]);
    }
  }



  public function borrar()
  {
    $formatos = Catalogo::formatos_declarapat($this->ley);
  
    foreach($formatos as $formato)
    {
      \DB::table($formato->ley."_".$formato->slug)->where('declaracion_id','=',$this->id)->delete();
    }

    \DB::table('declaracion_formato')->where('declaracion_id','=',$this->id)->delete();

    $this->delete();
  }

  //////////////////////////////////////////////////////
  //////////////////////// CREO TABLA
  //////////////////////////////////////////////////////
  public function Tabla()
  {
    if(!\Schema::hasTable('declaraciones'))
    {
      \Schema::create('declaraciones', function(Blueprint $table)
      {
        $table->increments('id');
        $table->string('rfc',10);
        $table->enum('tipo', ['Inicial','Modificación','Conclusión'])->default('Inicial');
        $table->string('ley',3)->default('l17');
        $table->boolean('fecha_sello');
        $table->timestamps();
      });
    }
  }//function tablas/

}
