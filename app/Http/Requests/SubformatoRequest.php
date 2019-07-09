<?php namespace App\Http\Requests;

use App\Http\Requests\Request;


class SubformatoRequest extends Request {



	public function authorize()
	{
		return true;
	}





	public function messages()
	{
		return [
						/*experiencia_laboral*/
						'funcion.required' 		 => 'La "función principal" es obligatoria.',
						'funcion.max'			 => 'La "función principal" no debe tener más de 35 caracteres.',
						'institucion.required'   => 'El "nombre de la institución" es obligatorio.',
						'institucion.max'		 => 'El "nombre de la institución" no debe tener más de 35 caracteres.',
						'unidad.required' 		 => 'La "unidad administrativa" es obligatoria.',
						'unidad.max'			 => 'La "unidad administrativa" no debe tener más de 35 caracteres.',
						'ingreso.required' 		 => 'La "fecha de ingreso" es obligatoria.',
						'ingreso.date' 		 	 => 'La "fecha de ingreso" no es una fecha.',
						'ingreso.before'	     => 'La "fecha de ingreso" debe ser antes de hoy.',
						'egreso.required'  		 => 'La "fecha de egreso" es obligatoria.',
						'egreso.date' 		 	 => 'La "fecha de egreso" no es una fecha.',
						'egreso.before'		 	 => 'La "fecha de egreso" debe ser antes de hoy.',
					 ];
	}





	public function rules()
	{

		if(($this->route('formato') == "escolaridad"))
		{
			$validation = [
							'nivel_educativo' => 'required|exists:catalogos.niveles_academicos,id',
							'institucion'     => 'required|max:35',
							'estatus'		  => 'required|exists:catalogos.estatus_escolaridad,estatus',
							'documento'		  => 'required|exists:catalogos.documentos_obtenidos,documento',
							'pais'			  => 'exists:catalogos.paises,pais',
							'provincia' 	  => 'max:35',
						];
		}///domicilio_encargo





		if(($this->route('formato') == "experiencia_laboral"))
		{
			$validation = [
											'sector' 			   => 'required|exists:catalogos.sectores',
											'razon_social'   => 'required_if:sector,PRIVADO,SOCIAL|max:35',
											'area'				   => 'required_if:sector,PRIVADO,SOCIAL|max:35',

											'poder' 			   => 'required_if:sector,PUBLICO|exists:catalogos.poderes',
											'ambito' 			   => 'required_if:sector,PUBLICO|exists:catalogos.ambitos',
											'institucion'	   => 'required_if:sector,PUBLICO|max:35',
											'unidad'			   => 'required_if:sector,PUBLICO|max:35',
											'puesto_o_cargo' => 'required_if:sector,PUBLICO|max:35',

											'puesto_o_cargo' => 'required|max:35',
											'funcion' 			 => 'required|max:35',
											'ingreso'				 => 'required|date',
											'egreso'				 => 'required|date',
										];
		}///domicilio_encargo





		if(($this->route('formato') == "datos_dependientes"))
		{
			$validation = [];
		}///domicilio_encargo




		if(($this->route('formato') == "datos_encargo"))
		{
			$validation = [];
		}///domicilio_encargo





		if(($this->route('formato') == "bienes_inmuebles"))
		{
			$validation = [];
		}///domicilio_encargo





		if(($this->route('formato') == "vehiculos"))
		{
			$validation = [];
		}///domicilio_encargo





		if(($this->route('formato') == "bienes_muebles"))
		{
			$validation = [];
		}///domicilio_encargo





		if(($this->route('formato') == "inversiones_cuentas"))
		{
			$validation = [];
		}///domicilio_encargo





		if(($this->route('formato') == "adeudos"))
		{
			$validation = [];
		}///domicilio_encargo





		if(($this->route('formato') == "puesto_comisiones"))
		{
			$validation = [];
		}///domicilio_encargo





		if(($this->route('formato') == "participaciones_economicas"))
		{
			$validation = [];
		}///domicilio_encargo


		

		return $validation;
	}
}
