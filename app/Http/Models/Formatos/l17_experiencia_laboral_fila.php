<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;


class l17_experiencia_laboral_fila extends Model
{
  use NullableFields;

  protected $table = 'l17_experiencia_laboral_fila';

  protected $nullable = ['sector','poder','ambito','institucion','unidad','razon_social','area','puesto_o_cargo','funcion','ingreso','egreso'];

  protected $fillable = ['declaracion_id','sector','poder','ambito','institucion','unidad','razon_social','area','puesto_o_cargo','funcion','ingreso','egreso'];

  public $timestamps = false;

  //////////////////////////////////////////////////////
  //////////////////////// SETTERS
  //////////////////////////////////////////////////////
  public function setRazonSocialAttribute($string){

    if($this->sector != "PUBLICO")
    {
      $this->attributes['razon_social'] = $string;
    }
    else
    {
      $this->attributes['razon_social'] = null;
    }
	}


  public function setAreaAttribute($string){

    if($this->sector != "PUBLICO")
    {
      $this->attributes['area'] = $string;
    }
    else
    {
      $this->attributes['area'] = null;
    }
  }


  public function setPoderAttribute($string){

    if($this->sector == "PUBLICO")
    {
      $this->attributes['poder'] = $string;
    }
    else
    {
      $this->attributes['poder'] = null;
    }
	}


  public function setAmbitoAttribute($string){

    if($this->sector == "PUBLICO")
    {
      $this->attributes['ambito'] = $string;
    }
    else
    {
      $this->attributes['ambito'] = null;
    }
	}


  public function setInstitucionAttribute($string){

    if($this->sector == "PUBLICO")
    {
      $this->attributes['institucion'] = $string;
    }
    else
    {
      $this->attributes['institucion'] = null;
    }
	}


  public function setUnidadAttribute($string){

    if($this->sector == "PUBLICO")
    {
      $this->attributes['unidad'] = $string;
    }
    else
    {
      $this->attributes['unidad'] = null;
    }
	}

  //////////////////////////////////////////////////////
  //////////////////////// CREO TABLA DE ACCIONES
  //////////////////////////////////////////////////////
  public function Tabla()
  {
    if(!\Schema::hasTable($this->table))
	  {
      \Schema::create($this->table, function(Blueprint $table)
      {
        $table->increments('id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('declaraciones')->onDelete('cascade');
        $table->string('sector',35)->nullable();
        $table->string('poder',35)->nullable();
        $table->string('ambito',35)->nullable();
        $table->string('institucion',35)->nullable();
        $table->string('unidad',35)->nullable();
        $table->string('razon_social',35)->nullable();
        $table->string('area',35)->nullable();
        $table->string('puesto_o_cargo',35)->nullable();
        $table->string('funcion',35)->nullable();
        $table->date('ingreso')->nullable();
        $table->date('egreso')->nullable();
      });
    }
	}//function tablas/
}
