<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;

use App\Http\Models\Auxiliares\Catalogo;


class l17_inversiones_cuentas_fila extends Model
{
  use NullableFields;

  protected $table = 'l17_inversiones_cuentas_fila';

  protected $fillable = ['declaracion_id','operacion','operacion','tipo_inversion','especifica_tipo','numero_cuenta','ubicacion','institucion','pais','saldo','moneda_saldo','titular','aclaraciones'];

  public $timestamps = false;

  ////////////////////////////////////////
  /*INICIO SETTERS*/
  ////////////////////////////////////////
  public function setTipoInversionAttribute($tipo_inversion_id){

    $this->attributes['tipo_inversion'] = Catalogo::tipo_inversion($tipo_inversion_id);
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
        $table->string('tipo_inversion',35)->nullable();
        $table->string('especifica_tipo',35)->nullable();
        $table->string('numero_cuenta',35)->nullable();
        $table->string('ubicacion',35)->nullable();
        $table->string('institucion',35)->nullable();
        $table->string('pais',35)->nullable();
        $table->string('saldo',35)->nullable();
        $table->string('moneda_saldo',35)->nullable();
        $table->string('titular',35)->nullable();
      });
    }
	}//function tablas/
}
