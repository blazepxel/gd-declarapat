<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;


class l17_inversiones_cuentas extends Model
{
  use NullableFields;

  protected $table = 'l17_inversiones_cuentas';

  protected $nullable = ['aclaraciones'];

  protected $fillable = ['declaracion_id','ninguno','aclaraciones'];

  protected $primaryKey = 'declaracion_id';

  public $timestamps = false;

  //////////////////////////////////////////////////////
  //////////////////////// METODOS
  //////////////////////////////////////////////////////
  public function filas(){

    $filas = \DB::table($this->table."_fila")->where('declaracion_id','=',$this->declaracion_id)
                                             ->get();
    return $filas;
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
        $table->integer('declaracion_id')->unsigned()->primary();
        $table->foreign('declaracion_id')->references('id')->on('declaraciones')->onDelete('cascade');
        $table->boolean('ninguno')->default('0');
        $table->text('aclaraciones',2500)->nullable();
      });
    }

    $crear = new l17_inversiones_cuentas_fila;
    $crear->tabla();
	}//function tablas/
}