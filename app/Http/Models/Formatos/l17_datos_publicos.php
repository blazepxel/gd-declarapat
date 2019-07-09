<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;


class l17_datos_publicos extends Model
{
  use NullableFields;

  protected $table = 'l17_datos_publicos';

  protected $nullable = ['aclaraciones'];

  protected $fillable = ['declaracion_id','publicar','aclaraciones'];

  protected $primaryKey = 'declaracion_id';

  public $timestamps = false;

  //////////////////////////////////////////////////////
  //////////////////////// MÉTODOS
  //////////////////////////////////////////////////////
  public function filas(){

    $filas = \DB::table($this->table)->where('declaracion_id','=',$this->declaracion_id)
                                     ->get();
    return $filas;
  }

  //////////////////////////////////////////////////////
  //////////////////////// GETTER
  //////////////////////////////////////////////////////
  public function getPublicarViewAttribute()
  {
    if($this->publicar == 1)
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
        $table->boolean('publicar')->default('0');
        $table->text('aclaraciones')->nullable();
      });
    }
	}//function tablas/
}
