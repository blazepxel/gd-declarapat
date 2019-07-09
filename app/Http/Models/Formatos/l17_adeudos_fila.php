<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;


class l17_adeudos_fila extends Model
{
  use NullableFields;

  protected $table = 'l17_adeudos_fila';

  protected $fillable = ['declaracion_id','operacion','tipo_inversion','numero_cuenta','nombre_cesionario','ubicacion','institucion_social','pais','fecha_otorgamiento','monto','moneda_monto','plazo','monto_pagos','saldo','moneda_saldo','titular','aclaraciones'];

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
        $table->string('tipo_inversion',35)->nullable();
        $table->string('numero_cuenta',35)->nullable();
        $table->string('nombre_cesionario',35)->nullable();
        $table->string('ubicacion',35)->nullable();
        $table->string('institucion_social',35)->nullable();
        $table->string('pais',35)->nullable();
        $table->string('fecha_otorgamiento',35)->nullable();
        $table->string('monto',35)->nullable();
        $table->string('moneda_monto',35)->nullable();
        $table->string('plazo',35)->nullable();
        $table->string('monto_pagos',35)->nullable();
        $table->string('saldo',35)->nullable();
        $table->string('moneda_saldo',35)->nullable();
        $table->string('titular',35)->nullable();
        $table->string('aclaraciones',35)->nullable();
      });
    }
	}//function tablas/
}
