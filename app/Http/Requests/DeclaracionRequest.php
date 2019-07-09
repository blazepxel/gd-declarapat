<?php namespace App\Http\Requests;

use App\Http\Requests\Request;


class DeclaracionRequest extends Request {



	public function authorize()
	{
		return true;
	}





	public function messages()
	{
		return [
						'tipo.required' => 'Selecciona un tipo de Declaración.',
						'tipo.in'				=> 'El "tipo de declaración" seleccionada no esta en la lista de opciones dadas.',
					 ];
	}





	public function rules()
	{
		return [
						'tipo' => 'required|in:Inicial,Modificación,Conclusión',
					 ];
	}
}
