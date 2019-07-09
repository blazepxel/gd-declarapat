<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;


class l17_participaciones_economicas_fila extends Model
{
  use NullableFields;

  protected $table = 'l17_participaciones_economicas_fila';

  protected $fillable = ['declaracion_id','operacion','fecha_constitucion','nombreb','responsableb','registro_publico','sector','tipo_sociedad','tipo_sociedad_especifica','tipo_contrato','tipo_contrato_especifica','antiguedad','inicio_participacion','ubicacion','estado','municipio','pais','provincia','fecha'];

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
        $table->string('fecha_constitucion',35)->nullable();
        $table->string('registro_publico',35)->nullable();
        $table->string('sector',35)->nullable();
        $table->string('tipo_sociedad',35)->nullable();
        $table->string('tipo_sociedad_especifica',35)->nullable();
        $table->string('tipo_contrato',35)->nullable();
        $table->string('tipo_contrato_especifica',35)->nullable();
        $table->string('antiguedad',35)->nullable();
        $table->string('inicio_participacion',35)->nullable();
        $table->string('ubicacion',35)->nullable();
        $table->string('estado',35)->nullable();
        $table->string('municipio',35)->nullable();
        $table->string('pais',35)->nullable();
        $table->string('provincia',35)->nullable();
      });
    }
	}//function tablas/
}
