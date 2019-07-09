<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;


class l17_datos_generales extends Model
{
  use NullableFields;

  protected $table = 'l17_datos_generales';

  protected $nullable = ['nombre','primer_apellido','segundo_apellido','curp','rfc','homoclave','email_personal','email_laboral','estado_civil','regimen_matrimonial','pais','estado','provincia','nacionalidad','celular','aclaraciones'];

  protected $fillable = ['declaracion_id','nombre','primer_apellido','segundo_apellido','curp','rfc','homoclave','email_personal','email_laboral','estado_civil','regimen_matrimonial','pais','provincia','estado','nacionalidad','celular','aclaraciones'];

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
  public function setRegimenMatrimonialAttribute($regimen){
    if($this->estado_civil == "CASADO (A)")
    {
      $this->attributes['regimen_matrimonial'] = $regimen;
    }
    else
		{
      $this->attributes['regimen_matrimonial'] = null;
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
        $table->string('nombre',25)->nullable();
        $table->string('primer_apellido',25)->nullable();
        $table->string('segundo_apellido',25)->nullable();
        $table->string('curp',18)->nullable();
        $table->string('rfc',13)->nullable();
        $table->string('homoclave',3)->nullable();
        $table->string('email_personal',55)->nullable();
        $table->string('email_laboral',55)->nullable();
        $table->string('estado_civil',15)->nullable();
        $table->string('regimen_matrimonial',20)->nullable();
        $table->string('pais',40)->default('MEXICO');
        $table->string('estado',25)->nullable();
        $table->string('nacionalidad',35)->default('MEXICANA');
        $table->string('celular',14)->nullable();
        $table->text('aclaraciones')->nullable();
      });
    }
	}//function tablas/
}
