<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;


class l17_puesto_comisiones_fila extends Model
{
  use NullableFields;

  protected $table = 'l17_puesto_comisiones_fila';

  protected $fillable = ['declaracion_id','operacion','responsable','entidad','vinculo','antiguedad','frecuencia','especifica_frecuencia','participacion','tipo_persona','tipo_persona_especifica','tipo_aporte','ubicacion','estado','municipio','pais','provincia','colonia','calle','numero_exterior','numero_interior','cp','aclaraciones'];

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
        $table->string('responsable',35)->nullable();
        $table->string('entidad',35)->nullable();
        $table->string('vinculo',35)->nullable();
        $table->string('antiguedad',35)->nullable();
        $table->string('frecuencia',35)->nullable();
        $table->string('especifica_frecuencia',35)->nullable();
        $table->string('participacion',35)->nullable();
        $table->string('tipo_persona',35)->nullable();
        $table->string('tipo_persona_especifica',35)->nullable();
        $table->string('tipo_aporte',35)->nullable();
        $table->string('ubicacion',35)->nullable();
        $table->string('estado',35)->nullable();
        $table->string('municipio',35)->nullable();
        $table->string('pais',35)->nullable();
        $table->string('provincia',35)->nullable();
        $table->string('colonia',35)->nullable();
        $table->string('calle',35)->nullable();
        $table->string('numero_exterior',35)->nullable();
        $table->string('numero_interior',35)->nullable();
        $table->string('cp',35)->nullable();        
      });
    }
	}//function tablas/
}
