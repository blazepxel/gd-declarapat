<?php namespace App\Http\Models\Formatos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Iatstuti\Database\Support\NullableFields;


class l17_aclaraciones extends Model
{
  use NullableFields;

  protected $table = 'l17_aclaraciones';

  protected $fillable = ['declaracion_id'];

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
      });
    }
    
    if(!\Schema::hasColumn('l17_bienes_inmuebles_fila', 'fecha_obra'))
    {
      \Schema::table('l17_bienes_inmuebles_fila', function (Blueprint $table)
      {
          $table->date('fecha_obra');
      });
    }



    if(!\Schema::hasColumn('l17_participaciones_economicas_fila', 'responsableb'))
    {
      \Schema::table('l17_participaciones_economicas_fila', function (Blueprint $table)
      {
          $table->string('responsableb');
      });
    }



  
    if(!\Schema::hasColumn('l17_participaciones_economicas_fila', 'nombreb'))
    {
      \Schema::table('l17_participaciones_economicas_fila', function (Blueprint $table)
      {
          $table->string('nombreb');
      });
    }



    if(!\Schema::hasColumn('l17_participaciones_economicas_fila', 'fecha'))
    {
      \Schema::table('l17_participaciones_economicas_fila', function (Blueprint $table)
      {
          $table->date('fecha');
      });
    }



    if(!\Schema::hasColumn('l17_vehiculos_fila', 'serieb'))
    {
      \Schema::table('l17_vehiculos_fila', function (Blueprint $table)
      {
          $table->string('serieb');
      });
    }
    
  }//function tablas/
}
