<?php namespace App\Http\Requests;

use App\Http\Requests\Request;


class DeclaranteRequest extends Request {



	public function authorize()
	{
		return true;
	}



	public function rules()
	{
		return [
			'rfc'              => 'required|alpha_num|min:10|max:10|unique:usuarios',
			'homoclave'        => 'required|alpha_num|min:3|max:3',
			'nombre'           => 'required|max:35',
			'apellido_paterno' => 'required|max:35',
			'apellido_materno' => 'max:35',
			'password'         => 'required',
		];
	}
}
