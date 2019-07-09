<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;


class l17_observaciones extends Model
{
  use NullableFields;

  protected $table = 'l17_observaciones';

  protected $nullable = ['observaciones'];

  protected $fillable = ['declaracion_id','ninguno','observaciones'];

  protected $primaryKey = 'declaracion_id';

  public $timestamps = false;

  //////////////////////////////////////////////////////
  //////////////////////// METODOS
  //////////////////////////////////////////////////////
  public function filas(){
    return []; //mover altera el funcionamiento
  }



  public function setNingunoAttribute($value)
  {
    $this->attributes['ninguno'] = $value;
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
        $table->text('observaciones')->nullable();
      });
    }
	}//function tablas/
}
