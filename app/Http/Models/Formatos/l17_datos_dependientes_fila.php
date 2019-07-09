<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;

use App\Http\Models\Auxiliares\Catalogo;


class l17_datos_dependientes_fila extends Model
{
  use NullableFields;

  protected $table = 'l17_datos_dependientes_fila';

  protected $nullable = ['nombre','primer_apellido','segundo_apellido','parentesco','ciudadano_extranjero','curp','dependiente_economico','servidor_publico','dependencia','periodo','cohabitante','estado','municipio','pais','provincia','condado','colonia','calle','numero_exterior','numero_interior','cp','aclaraciones'];

  protected $fillable = ['declaracion_id','nombre','primer_apellido','segundo_apellido','parentesco','ciudadano_extranjero','curp','dependiente_economico','servidor_publico','dependencia','periodo','cohabitante','estado','municipio','pais','provincia','condado','colonia','calle','numero_exterior','numero_interior','cp','aclaraciones'];

  public $timestamps = false;
  
  //////////////////////////////////////////////////////
  //////////////////////// GETTER
  //////////////////////////////////////////////////////
  public function getEstadoAttribute($value)
  {
    if($value == null)
    {
      return null;
    }
    else
    {
      return Catalogo::estado($value);
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
        $table->string('nombre',35)->nullable();
        $table->string('primer_apellido',35)->nullable();
        $table->string('segundo_apellido',35)->nullable();
        $table->string('parentesco',35)->nullable();
        $table->string('ciudadano_extranjero',2)->nullable('NO');
        $table->string('curp',18)->nullable();
        $table->string('dependiente_economico',2)->default('SÍ')->nullable();
        $table->string('servidor_publico',2)->default('NO')->nullable();
        $table->string('dependencia',35)->nullable();
        $table->string('periodo',35)->nullable();
        $table->string('cohabitante',2)->default('SÍ')->nullable();
        $table->string('pais',35)->nullable('MEXICO');
        $table->string('estado',35)->nullable();
        $table->string('municipio',35)->nullable();
        $table->string('provincia',35)->nullable();
        $table->string('condado',35)->nullable();
        $table->string('colonia',35)->nullable();
        $table->string('calle',35)->nullable();
        $table->string('numero_exterior',4)->nullable();
        $table->string('numero_interior',3)->nullable();
        $table->string('cp',5)->nullable();
      });
    }
	}//function tablas/
}
