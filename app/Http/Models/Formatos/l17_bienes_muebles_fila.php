<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;


class l17_bienes_muebles_fila extends Model
{
  use NullableFields;

  protected $table = 'l17_bienes_muebles_fila';

  protected $fillable = ['declaracion_id','operacion','tipo_bien','descripcion','forma_adquisicion','nombre_cesionario','nombre_donacion','nombre_herencia','nombre_enjenante','relacion_titular','relacion_cesionario','relacion_donacion','relacion_herencia','fecha_adquisicion','valor_bien','moneda_bien','titular','forma_operacion','fecha_venta','valor_operacion','moneda_operacion','aclaraciones'];

  public $timestamps = false;

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
        $table->string('tipo_bien',35)->nullable();
        $table->string('descripcion',35)->nullable();
        $table->string('forma_adquisicion',35)->nullable();
        $table->string('nombre_cesionario',35)->nullable();
        $table->string('nombre_donacion',35)->nullable();
        $table->string('nombre_herencia',35)->nullable();
        $table->string('nombre_enjenante',35)->nullable();
        $table->string('relacion_titular',35)->nullable();
        $table->string('relacion_cesionario',35)->nullable();
        $table->string('relacion_donacion',35)->nullable();
        $table->string('relacion_herencia',35)->nullable();
        $table->string('fecha_adquisicion',35)->nullable();
        $table->string('valor_bien',35)->nullable();
        $table->string('moneda_bien',35)->nullable();
        $table->string('titular',35)->nullable();
        $table->string('forma_operacion',35)->nullable();
        $table->string('fecha_venta',35)->nullable();
        $table->string('valor_operacion',35)->nullable();
        $table->string('moneda_operacion',35)->nullable();
        $table->string('aclaraciones',35)->nullable();
      });
    }
	}//function tablas/
}
