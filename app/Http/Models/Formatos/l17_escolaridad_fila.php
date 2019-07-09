<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;

use App\Http\Models\Auxiliares\Catalogo;


class l17_escolaridad_fila extends Model
{
  use NullableFields;

  protected $table = 'l17_escolaridad_fila';

  protected $nullable = ['declaracion_id','pais','provincia','estado','municipio','conocimiento','institucion','nivel_educativo','estatus','no_periodos','periodo','documento','cedula'];

  protected $fillable = ['declaracion_id','pais','provincia','estado','municipio','conocimiento','institucion','nivel_educativo','estatus','no_periodos','periodo','documento','cedula'];

  public $timestamps = false;

  //////////////////////////////////////////////////////
  //////////////////////// GETTERS
  //////////////////////////////////////////////////////
  public function getNivelEducativoIdAttribute(){

    $nivel = Catalogo::nivel_educativo_id($this->nivel_educativo);

    return $nivel;
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
  //////////////////////// SETTERS
  //////////////////////////////////////////////////////
  public function setNivelEducativoAttribute($id){

    $nivel = Catalogo::nivel_educativo($id);

    $this->attributes['nivel_educativo'] = $nivel;
    $this->attributes['nivel_educativo_id'] = $id;
	}





  public function setPaisAttribute($pais){

    if($this->nivel_educativo_id > 3 and $this->pais != "MEXICO")
    {
      $this->attributes['pais'] = $pais;
    }
    else
    {
      $this->attributes['pais'] = null;
    }
	}





  public function setEstadoAttribute($estado){

    if($this->nivel_educativo_id > 3 and $this->pais == "MEXICO")
    {
      $this->attributes['estado'] = Catalogo::estado($estado);
    }
    else
    {
      $this->attributes['estado'] = $estado;
    }
	}





  public function setMunicipioAttribute($municipio){

    if($this->nivel_educativo_id > 3 and $this->pais == "MEXICO")
    {
      $this->attributes['municipio'] = $municipio;
    }
    else
    {
      $this->attributes['municipio'] = $municipio;
    }
	}





  public function setConocimientoAttribute($conocimiento){

    if($this->nivel_educativo_id > 3)
    {
      $this->attributes['conocimiento'] = $conocimiento;
    }
    else
    {
      $this->attributes['conocimiento'] = null;
    }
	}





  public function setNoPeriodosAttribute($no){

    if($this->estatus != "FINALIZADO" and $no > 0)
    {
      $this->attributes['no_periodos'] = $no;
    }
    else
    {
      $this->attributes['no_periodos'] = null;
    }
	}



  public function setPeriodoAttribute($no){

    if($this->estatus != "FINALIZADO")
    {
      $this->attributes['periodo'] = $no;
    }
    else
    {
      $this->attributes['periodo'] = null;
    }
  }





  public function setDocumentoAttribute($doc){

    if($this->nivel_educativo_id < 3 and $doc == "TITULO")
    {
      $this->attributes['documento'] = null;
    }
    else
    {
      $this->attributes['documento'] = $doc;
    }
  }





  public function setCedulaAttribute($doc){

    if($this->documento != "TITULO")
    {
      $this->attributes['cedula'] = null;
    }
    else
    {
      $this->attributes['documento'] = $doc;
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
        $table->increments('id');
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('declaraciones')->onDelete('cascade');
        $table->string('nivel_educativo',35)->nullable();
        $table->integer('nivel_educativo_id')->nullable();
        $table->string('pais',35)->nullable()->default('MEXICO');
        $table->string('estado',35)->nullable();
        $table->string('municipio',35)->nullable();
        $table->string('conocimiento',35)->nullable();
        $table->string('institucion',35)->nullable();
        $table->string('estatus',12)->nullable();
        $table->integer('no_periodos')->nullable();
        $table->string('periodo',15)->nullable();
        $table->string('documento',35)->nullable();
        $table->string('cedula',35)->nullable();
      });
    }
	}//function tablas/
}
