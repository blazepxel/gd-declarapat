<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;

use App\Http\Models\Auxiliares\Catalogo;



class l17_bienes_inmuebles_fila extends Model
{
  use NullableFields;

  protected $table = 'l17_bienes_inmuebles_fila';

  protected $fillable = ['declaracion_id','operacion','tipo_bien','tipo_obra','superficie_terreno','superficie_construccion','forma_adquisicion','nombre_cesionario','nombre_enjenante','nombre_credito','nombre_donacion','nombre_herencia','relacion_titular','relacion_cesionario','relacion_donacion','relacion_herencia','especifica_relacion','valor_inmueble','moneda_valor','fecha_adquisicion','registro_publico','titular','forma_operacion','valor_venta','moneda_venta','fecha_venta','ubicacion','estado','municipio','pais','provincia','colonia','calle','numero_exterior','numero_exterior','numero_interior','cp','aclaraciones','fecha_obra'];

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
        $table->string('operacion',35)->nullable();
        $table->string('tipo_bien',35)->nullable();
        $table->string('tipo_obra',35)->nullable();
        $table->string('superficie_terreno',35)->nullable();
        $table->string('superficie_construccion',35)->nullable();
        $table->string('forma_adquisicion',35)->nullable();
        $table->string('nombre_cesionario',35)->nullable();
        $table->string('nombre_enjenante',35)->nullable();
        $table->string('nombre_credito',35)->nullable();
        $table->string('nombre_donacion',35)->nullable();
        $table->string('nombre_herencia',35)->nullable();
        $table->string('relacion_titular',35)->nullable();
        $table->string('relacion_cesionario',35)->nullable();
        $table->string('relacion_donacion',35)->nullable();
        $table->string('relacion_herencia',35)->nullable();
        $table->string('especifica_relacion',35)->nullable();
        $table->string('valor_inmueble',35)->nullable();
        $table->string('moneda_valor',35)->nullable();
        $table->string('fecha_adquisicion',35)->nullable();
        $table->string('registro_publico',35)->nullable();
        $table->string('titular',35)->nullable();
        $table->string('forma_operacion',35)->nullable();
        $table->string('valor_venta',35)->nullable();
        $table->string('moneda_venta',35)->nullable();
        $table->string('fecha_venta',35)->nullable();
        $table->string('ubicacion',35)->nullable();
        $table->string('estado',35)->nullable();
        $table->string('municipio',35)->nullable();
        $table->string('pais',35)->nullable();
        $table->string('provincia',35)->nullable();
        $table->string('colonia',35)->nullable();
        $table->string('calle',35)->nullable();
        $table->string('numero_exterior',35)->nullable();
        $table->string('numero_interior',35)->nullable();
        $table->string('cp',35)->nullable();
        $table->string('aclaraciones',35)->nullable();
      });
    }
	}//function tablas/
}
