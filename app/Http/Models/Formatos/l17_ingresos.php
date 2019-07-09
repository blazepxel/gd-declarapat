<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;


class l17_ingresos extends Model
{
  use NullableFields;

  protected $table = 'l17_ingresos';

  protected $fillable = ['declaracion_id','remuneracion_anual','otros_ingresos','actividad_industrial','especifica_industrial','especifica_financiera','actividad_financiera','servicios_profesionales','especifica_servicios','otros','especifica_otros','ingreso_anual_neto','ingreso_anual','especifica_anual','total_ingresos','aclaraciones'];

  protected $primaryKey = 'declaracion_id';

  public $timestamps = false;

  //////////////////////////////////////////////////////
  //////////////////////// SETTERS
  //////////////////////////////////////////////////////
  
  public function getRemuneracionAnualAttribute($value)
  { 
    if(is_numeric($value))
    {
      return $value;
    }
    else
    {
      return 0;
    }
  } 

  public function getActividadIndustrialAttribute($value)
  {
    if(is_numeric($value))
    {
      return $value;
    }
    else
    {
      return 0;
    }
  }

  public function getActividadFinancieraAttribute($value)
  {
    if(is_numeric($value))
    {
      return $value;
    }
    else
    {
      return 0;
    }
  }

  public function getServiciosProfesionalesAttribute($value)
  {
    if(is_numeric($value))
    {
      return $value;
    }
    else
    {
      return 0;
    }
  }

  public function getOtrosAttribute($value)
  {
    if(is_numeric($value))
    {
      return $value;
    }
    else
    {
      return 0;
    }
  }

  public function getIngresoAnualAttribute($value)
  {
    if(is_numeric($value))
    {
      return $value;
    }
    else
    {
      return 0;
    }
  }
  //////////////////////////////////////////////////////
  //////////////////////// METODOS
  //////////////////////////////////////////////////////

  public function filas(){

    $filas = \DB::table($this->table)->where('declaracion_id','=',$this->declaracion_id)
                                     ->get();
    return $filas;
  }


  public function extras(){
    return $this->actividad_industrial + $this->actividad_financiera + $this->servicios_profesionales + $this->otros;
  }


  public function netos(){
    return $this->extras() + $this->remuneracion_anual;
  }


  public function total(){
    return $this->netos() + $this->ingreso_anual;
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
        
        $table->string('remuneracion_anual',35)->nullable();
        $table->string('otros_ingresos',35)->nullable();

        $table->string('actividad_industrial',35)->nullable();
        $table->string('especifica_industrial',35)->nullable();

        $table->string('actividad_financiera',35)->nullable();
        $table->string('especifica_financiera',35)->nullable();

        $table->string('servicios_profesionales',35)->nullable();
        $table->string('especifica_servicios',35)->nullable();

        $table->string('otros',35)->nullable();
        $table->string('especifica_otros',35)->nullable();

        $table->string('ingreso_anual_neto',35)->nullable();
        $table->string('ingreso_anual',35)->nullable();
        $table->string('especifica_anual',35)->nullable();
        $table->string('total_ingresos',35)->nullable();
        $table->text('aclaraciones')->nullable();
      });
    }
	}//function tablas/
}
