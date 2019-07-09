<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;

use App\Http\Models\Auxiliares\Catalogo;


class l17_domicilio_encargo extends Model
{
  use NullableFields;

  protected $table = 'l17_domicilio_encargo';

  protected $fillable = ['declaracion_id','pais','estado','municipio','provincia','condado','numero_exterior','numero_interior','colonia','calle','cp','telefono','extension','aclaraciones'];

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

  ////////////////////////////////////////
  /*INICIO SETTERS*/
  ////////////////////////////////////////
  public function setProvinciaAttribute($provincia){
    if($this->pais != "MEXICO")
    {
      $this->attributes['provincia'] = $provincia;
    }
    else
		{
      $this->attributes['provincia'] = null;
    }
  }
  


  public function setCondadoAttribute($condado){
    if($this->pais != "MEXICO")
    {
      $this->attributes['condado'] = $condado;
    }
    else
		{
      $this->attributes['condado'] = null;
    }
	}



  public function setEstadoAttribute($estado){

    if($this->pais == "MEXICO")
    {
      $estado = Catalogo::estado($estado);

      $this->attributes['estado'] = $estado;
    }
    else
		{
      $this->attributes['estado'] = null;
    }
	}



  public function setMunicipioAttribute($municipio){
    if($this->pais == "MEXICO")
    {
      $this->attributes['municipio'] = $municipio;
    }
    else
		{
      $this->attributes['municipio'] = null;
    }
	}



  public function getEstadoIdAttribute(){

    if($this->estado)
    {
      $id = Catalogo::estado_id($this->estado);
    }
    else
    {
      $id = null;
    }

    return $id;
	}

  //////////////////////////////////////////////////////
  //////////////////////// MÉTODOS
  //////////////////////////////////////////////////////
  public function total_filas(){
    return true;
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
        $table->string('pais',35)->nullable()->default('MEXICO');
        $table->string('provincia',30)->nullable();
        $table->string('condado',30)->nullable();
        $table->string('estado',35)->nullable();
        $table->string('municipio',35)->nullable();
        $table->string('colonia',30)->nullable();
        $table->string('calle',35)->nullable();
        $table->string('numero_exterior',4)->nullable();
        $table->string('numero_interior',3)->nullable();
        $table->string('cp',5)->nullable();
        $table->string('telefono',12)->nullable();
        $table->string('extension',12)->nullable();
        $table->text('aclaraciones')->nullable();
      });
    }
	}//function tablas/
}
