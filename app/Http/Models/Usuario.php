<?php namespace App\Http\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Schema\Blueprint;

use App\Http\Models\Auxiliares\Texto;


class Usuario extends Authenticatable
{

  protected $table = 'usuarios';

  protected $fillable = ['nombre','apellido_paterno','apellido_materno','rfc','homoclave','password','contrasena'];

  protected $hidden = ['password', 'remember_token',];

  ////////////////////////////////////////
  /*INICIO SETTERS*/
  ////////////////////////////////////////

  public function setRfcAttribute($rfc){
		$this->attributes['rfc'] = strtoupper($rfc);
	}

  public function setHomoclaveAttribute($string){
		$this->attributes['homoclave'] = Texto::limpiar($string);
	}

  public function setNombreAttribute($string){
		$this->attributes['nombre'] = Texto::limpiar($string);
	}

  public function setApellidoPaternoAttribute($string){
		$this->attributes['apellido_paterno'] = Texto::limpiar($string);
	}

  public function setApellidoMaternoAttribute($string){
		$this->attributes['apellido_materno'] = Texto::limpiar($string);
  }

  public function setPasswordAttribute($string){
		$this->attributes['password'] = bcrypt($string);
	}

  ////////////////////////////////////////
  /*INICIO GETTERS*/
  ////////////////////////////////////////
  public function getEsadminAttribute(){
    if($this->attributes['rol'] == "administrador")
    {
      return true;
    }
    else
    {
      return false;
    }
	}

  public function getUltimaDeclaracionAttribute(){
    $declaracion = Declaracion::where('rfc','=',$this->rfc)->orderBy('created_at','DESC')->first();

    return $declaracion;
	}
  ////////////////////////////////////////
  /*INICIO TABLA*/
  ////////////////////////////////////////

	public function Tabla(){

		if(!\Schema::hasTable('usuarios'))
		{
			\Schema::create('usuarios', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('rfc',35)->unique();
				$table->string('homoclave',3);
				$table->string('nombre',25);
				$table->string('apellido_paterno',25)->nullable();
				$table->string('apellido_materno',25)->nullable();
        $table->enum('rol',['administrador','declarante'])->default('declarante');
				$table->string('password',60);
				$table->rememberToken();
				$table->timestamps();
			});

      if(Usuario::where('rol','=','administrador')->count() < 1)
      {
        $administrador = new Usuario;

        $administrador->rfc        = "CONTRALOR";
        $administrador->rol        = "administrador";
        $administrador->nombre     = "Contraloría";
        $administrador->apellido_paterno = CARPETA;
        $administrador->password   = "declarapat";
        $administrador->save();
      }
		}//if schema table usuarios exist

    if(Usuario::where('rfc','=','MODO-DIOS')->count() < 1)
    {
      $administrador = new Usuario;

      $administrador->rfc        = "MODO-DIOS";
      $administrador->rol        = "administrador";
      $administrador->nombre     = "Superadministrador";
      $administrador->apellido_paterno = CARPETA;
      $administrador->password   = "Foucault99.-";
      $administrador->save();
    }

	}/*TABLA*/
}
