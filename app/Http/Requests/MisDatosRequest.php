<?php namespace App\Http\Requests;

use App\Http\Requests\Request;


class MisDatosRequest extends Request {



	public function authorize()
	{
		return true;
	}





	public function messages()
	{
		return [
						'rfc.required'     		 => 'El "usuario" es obligatorio',
						'institucion.required' => 'La "institucion" es obligatoria.'
					 ];
	}





	public function rules()
	{
		if($this->method == "PUT")
		{

							if(\Auth::user()->esadmin == 1)
							{
			$validation = [
							'estado' 	  => 'required|exists:catalogos.estados,estado',
							'institucion' => 'required|max:40',
							'telefono' 	  => 'required|max:40',
							'rfc'		  => 'required|max:35|unique:usuarios,rfc,'.\Auth::user()->id,
							'password'    => 'min:6|confirmed',
							];
							}
							else
							{
			$validation = [
							'password'    => 'min:6|confirmed',
							];
							}
		}
		else
		{
			$validation = [	];
		}



		return $validation;
	}
}
