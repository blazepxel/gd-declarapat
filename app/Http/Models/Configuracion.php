<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;


class Configuracion extends Model
{
  protected $table = 'configuracion';

  protected $fillable = ['carpeta'];

  protected $hidden = [];

  public $timestamps = false;

  protected $primaryKey = 'carpeta';

  //////////////////////////////////////////////////////
  //////////////////////// SETTERS
  //////////////////////////////////////////////////////
  public function setInstitucionAttribute($value)
  {
    $this->attributes['institucion'] = strtoupper($value);
  }

  //////////////////////////////////////////////////////
  //////////////////////// CREO TABLA
  //////////////////////////////////////////////////////
  public function Tabla()
  {
    if(!\Schema::hasTable('configuracion'))
    {
      \Schema::create('configuracion', function(Blueprint $table)
      {
        $table->string('carpeta',40)->primary();
        $table->string('estado',35)->default('MICHOACAN DE OCAMPO');
        $table->string('institucion',40)->default('mnicipio');
        $table->string('telefono',40)->nullable();
        $table->string('codigo',4)->nullable();
      });

      Configuracion::create(['carpeta' => CARPETA]);
    }
  }//function tablas/

}
