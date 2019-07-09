<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;


class l17_vehiculos_fila extends Model
{
  use NullableFields;

  protected $table = 'l17_vehiculos_fila';

  protected $fillable = ['declaracion_id','operacion','marca','tipo','modelo','serieb','ubicacion','pais','forma_adquisicion','valor_adquisicion','moneda_adquisicion','fecha_adquisicion','titular','forma_operacion','valor_operacion','moneda_operacion','fecha_venta','tipo_siniestro','aseguradora','fecha_siniestro','valor_siniestro','moneda_siniestro','aclaraciones'];

  public $timestamps = false;

  
  //////////////////////////////////////////////////////
  //////////////////////// GETTER
  //////////////////////////////////////////////////////
  public function getSeriebAttribute($value)
  {
    if(!$value)
    {
      return "S/N";
    }
    else
    {
      return $value;
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
        $table->string('operacion',35)->nullable();
        $table->string('marca',35)->nullable();
        $table->string('tipo',35)->nullable();
        $table->string('modelo',35)->nullable();
        $table->string('serieb',35)->nullable();
        $table->string('ubicacion',35)->nullable();
        $table->string('pais',35)->nullable();
        $table->string('forma_adquisicion',35)->nullable();
        $table->string('valor_adquisicion',35)->nullable();
        $table->string('moneda_adquisicion',35)->nullable();
        $table->string('fecha_adquisicion',35)->nullable();
        $table->string('titular',35)->nullable();
        $table->string('forma_operacion',35)->nullable();
        $table->string('valor_operacion',35)->nullable();
        $table->string('moneda_operacion',35)->nullable();
        $table->string('fecha_venta',35)->nullable();
        $table->string('tipo_siniestro',35)->nullable();
        $table->string('aseguradora',35)->nullable();
        $table->string('fecha_siniestro',35)->nullable();
        $table->string('valor_siniestro',35)->nullable();
        $table->string('moneda_siniestro',35)->nullable();
      });
    }
	}//function tablas/
}
