<?php

namespace App\Http\Controllers\Auth;

use App\Http\Models\Usuario;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Registration & Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users, as well as the
  | authentication of existing users. By default, this controller uses
  | a simple trait to add these behaviors. Why don't you explore it?
  |
  */

  protected $username = 'rfc';

  use AuthenticatesAndRegistersUsers, ThrottlesLogins;

  protected $redirectTo = '/'; /*** Where to redirect users after login / registration. ** @var string*/





  public function __construct() /*** Create a new authentication controller instance. ** @return void*/
  {
    $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
  }





  protected function validator(array $data)   /*** Get a validator for an incoming registration request. ** @param  array  $data* @return \Illuminate\Contracts\Validation\Validator */
  {
    return Validator::make($data, [
                                    'nombre'           => 'required|max:25',
                                    'apellido_paterno' => 'required|max:25',
                                    'apellido_materno' => 'required|max:25',
                                    'rfc'              => 'required|max:10|min:10|unique:usuarios',
                                    'password'         => 'required|min:6|confirmed',
                                  ]);
  }





  protected function create(array $data)/*** Create a new user instance after a valid registration. ** @param  array  $data * @return User */
  {
    return Usuario::create([
                            'nombre'           => $data['nombre'],
                            'apellido_paterno' => $data['apellido_paterno'],
                            'apellido_materno' => $data['apellido_materno'],
                            'rfc'              => $data['rfc'],
                            'password'         => $data['password'],
                          ]);
  }

}
