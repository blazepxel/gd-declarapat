<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;


class l17_exservidor extends Model
{
  use NullableFields;

  protected $table = 'l17_exservidor';

  protected $fillable = ['declaracion_id','exservidor','ingreso','egreso','aclaraciones'];

  protected $primaryKey = 'declaracion_id';

  public $timestamps = false;

  //////////////////////////////////////////////////////
  //////////////////////// METODOS
  //////////////////////////////////////////////////////
  public function filas(){

    $filas = \DB::table($this->table)->where('declaracion_id','=',$this->declaracion_id)
                                     ->get();
    return $filas;
  }

  //////////////////////////////////////////////////////
  //////////////////////// GETTERS
  //////////////////////////////////////////////////////
  public function getExservidorViewAttribute()
  {
    if($this->exservidor == 1)
    {
      return "SÍ";
    }
    else
    {
      return "NO";
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
        $table->integer('declaracion_id')->unsigned()->primary();
        $table->foreign('declaracion_id')->references('id')->on('declaraciones')->onDelete('cascade');
        $table->boolean('exservidor')->default('0');
        $table->date('ingreso');
        $table->date('egreso');
        $table->text('aclaraciones')->nullable();
      });
    }
	}//function tablas/
}
