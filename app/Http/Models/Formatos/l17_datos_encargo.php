<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;

use Carbon\Carbon;


class l17_datos_encargo extends Model
{
  use NullableFields;

  protected $table = 'l17_datos_encargo';

  protected $fillable = ['declaracion_id','dependencia','nombre_empleo','honorarios','nivel_cargo','area_adscripcion','fecha','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','otro','aclaraciones'];

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
  //////////////////////// SETTERS
  //////////////////////////////////////////////////////
  public function setNivelCargoAttribute($string){
    if($this->honorarios == 0)
    {
      $this->attributes['nivel_cargo'] = $string;
    }
    else
		{
      $this->attributes['nivel_cargo'] = null;
    }
	}

  //////////////////////////////////////////////////////
  //////////////////////// GETTER
  //////////////////////////////////////////////////////
  public function getHonorariosViewAttribute()
  {
    if($this->honorarios == 1)
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
        $table->string('dependencia',35)->nullable();
        $table->string('nombre_empleo',35)->nullable();
        $table->boolean('honorarios')->nullable()->default('0');
        $table->string('nivel_cargo',35)->nullable();
        $table->string('area_adscripcion',35)->nullable();
        $table->date('fecha')->nullable();
        $table->boolean('a')->nullable();
        $table->boolean('b')->nullable();
        $table->boolean('c')->nullable();
        $table->boolean('d')->nullable();
        $table->boolean('e')->nullable();
        $table->boolean('f')->nullable();
        $table->boolean('g')->nullable();
        $table->boolean('h')->nullable();
        $table->boolean('i')->nullable();
        $table->boolean('j')->nullable();
        $table->boolean('k')->nullable();
        $table->boolean('l')->nullable();
        $table->boolean('m')->nullable();
        $table->boolean('n')->nullable();
        $table->boolean('o')->nullable();
        $table->string('otro',35)->nullable();
        $table->text('aclaraciones')->nullable();        
      });
    }
  }//function tablas/
}
