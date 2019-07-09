<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use App\Http\Models\Auxiliares\Catalogo;


class Declaracion_Formato extends Model
{
  protected $table = 'declaracion_formato';

  protected $fillable = ['declaracion_id','formato_id'];

  public $timestamps = false;

  //////////////////////////////////////////////////////
  //////////////////////// FUNCIONES
  //////////////////////////////////////////////////////
  public function getFormatoAttribute()
  {
    $formato = Catalogo::formato_declarapat($this->formato_id);

    return $formato;
  }

  //////////////////////////////////////////////////////
  //////////////////////// CREO TABLA
  //////////////////////////////////////////////////////
  public function Tabla()
  {
    if(!\Schema::hasTable('declaracion_formato'))
    {
      \Schema::create('declaracion_formato', function(Blueprint $table)
      {
        $table->integer('declaracion_id')->unsigned()->default(null);
        $table->foreign('declaracion_id')->references('id')->on('declaraciones')->onDelete('cascade');
        $table->integer('formato_id');
        $table->boolean('estatus')->default(0);
        $table->primary(['declaracion_id', 'formato_id']);
      });
    }
  }//function tablas/
}
