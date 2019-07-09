<?php namespace App\Http\Requests;

use App\Http\Requests\Request;


class FormatoRequest extends Request {



	public function authorize()
	{
		return true;
	}





	public function messages()
	{
		return [
						/*DATOS GENERALES*/
						'homoclave.required' 						=> 'La "homoclave" es obligatoria.',
						'homoclave.max' 								=> 'La "homoclave" debe tener máximo 3 caracteres.',
						'homoclave.min' 								=> 'La "homoclave" debe tener mínimo 3 caracteres.',
						'homoclave.min' 								=> 'La "homoclave" debe tener mínimo 3 caracteres.',
						'nacionalidad.required' 				=> 'La "nacionalidad" es obligatoria.',
						'celular.numeric' 							=> 'El "número de celular" debe llevar únicamente números.',

						/*ESCOLARIDAD CREAR*/

						/*DOMICILIO DECLARANTE*/
						'ubicacion.required' 						=> 'La "ubicación" es obligatoria.',
						'estado.required_if'						=> 'El "estado" es obligatorio si la "ubicación" está en MEXICO.',
						'municipio.required_if'					=> 'El "municipio" es obligatorio si la "ubicación" está en MEXICO.',
						'pais.required_if'							=> 'El "país" es obligatorio si la "ubicación" está en el EXTRANJERO.',
						'provincia.required_if'					=> 'El "estado o provincia" es obligatorio si la "ubicación" está en el EXTRANJERO.',
						'provincia.max'			 						=> 'El nombre del "estado o provincia" no puede tener más de 35 caracteres.',
						'colonia.required'		 					=> 'El nombre de la "localidad o colonia" es obligatorio.',
						'colonia.max'				 						=> 'El nombre de la "localidad o colonia" no puede tener más de 35 caracteres.',
						'calle.required'		 						=> 'El nombre de la "calle" es obligatorio.',
						'calle.max'					 						=> 'El nombre de la "calle" no puede tener más de 35 caracteres.',
						'telefono.numeric' 							=> 'El "teléfono" debe llevar únicamente números.',

						/*OBSERVACIONES*/
						'observaciones.required_unless' => 'Olvidaste agregar tus "observaciones".',

						/*TODOS LOS FORMATOS*/
						'aclaraciones.max' 							=> 'Las "aclaraciones" no deben tener más de 2500 caracteres.',
					 ];
	}





	public function rules()
	{
		if(($this->route('formato') == "datos_generales"))
		{
			$validation = [
							'nombre' 				=> 'required|max:25',
							'primer_apellido'  		=> 'required|max:25',
							'segundo_apellido' 		=> 'max:25',
							'curp'			  		=> 'required|max:18|min:18|alpha_num',
							'homoclave'	  		 	=> 'required|max:3|min:3|alpha_num',
							'email_laboral'		 	=> 'email|max:55',
							'email_personal'		=> 'email|max:55',
							'estado_civil'		 	=> 'required|exists:catalogos.estados_civiles,estado',
							'regimen_matrimonial' 	=> 'required_if:estado_civil,CASADO (A)|exists:catalogos.regimenes_matrimoniales,regimen',
							'pais'					=> 'required|exists:catalogos.paises,pais',
							'estado'				=> 'required',
							'nacionalidad'			=> 'required|exists:catalogos.nacionalidades,nacionalidad',
							'celular' 				=> 'numeric',
							'aclaraciones'		 	=> 'max:2500',
						];
		}///domicilio_declarante





		if(($this->route('formato') == "domicilio_declarante"))
		{
			$validation = [
							'pais' 	=> 'exists:catalogos.paises,pais',
							'colonia' 		  => 'required|max:35',
							'calle' 		  => 'required|max:35',
							'numero_exterior' => 'numeric|max:9999',
							'numero_interior' => 'numeric|max:999',
							'cp'			  => 'required|numeric|max:99998|min:1000',
							'telefono'		  => 'numeric',
							'aclaraciones'	  => 'max:2500'
						];
		}///domicilio_declarante





		if(($this->route('formato') == "escolaridad"))
		{
			$validation = [
											'aclaraciones'		=> 'max:2500'
										];
		}///domicilio_encargo





		if(($this->route('formato') == "experiencia_laboral"))
		{
			$validation = [
											'ninguno' 			=> 'boolean',
											'aclaraciones'		=> 'max:2500'
										];
		}///domicilio_encargo





		if(($this->route('formato') == "datos_publicos"))
		{
			$validation = [
											'publico'			 => 'boolean',
											'aclaraciones' => 'max:2500'
										];
		}///domicilio_encargo





		if(($this->route('formato') == "datos_dependientes"))
		{
			$validation = [
											'ninguno'			 => 'boolean',
											'aclaraciones' => 'max:2500'
										];
		}///domicilio_encargo





		if(($this->route('formato') == "datos_encargo"))
		{
			$validation = [
											'aclaraciones'		=> 'max:2500'
										];
		}///domicilio_encargo





		if(($this->route('formato') == "domicilio_encargo"))
		{
			$validation = [
							'pais' 				=> 'exists:catalogos.paises,pais',
							'colonia' 			=> 'required|max:35',
							'calle' 			=> 'required|max:35',
							'numero_exterior' 	=> 'numeric|max:9999|min:1',
							'numero_interior' 	=> 'numeric|max:999|min:1',
							'cp'				=> 'required|numeric|max:99998|min:1000',
							'telefono'			=> 'numeric',
							'aclaraciones'		=> 'max:2500'
										];
		}///domicilio_declarante





		if(($this->route('formato') == "exservidor"))
		{
			$validation = [
											'exservidor'	 => 'boolean',
											'ingreso'		 => 'date|date:dd/mm/yyyy|before:'.\Carbon::now()->format('d-m-Y'),
											'egreso'		 => 'date|date:dd/mm/yyyy|before:'.\Carbon::now()->format('d-m-Y'),
											'aclaraciones' 	 => 'max:2500'
										];
		}///domicilio_encargo





		if(($this->route('formato') == "bienes_inmuebles"))
		{
			$validation = [
											'ninguno'			 => 'boolean',
											'aclaraciones' => 'max:2500'
										];
		}///domicilio_encargo





		if(($this->route('formato') == "vehiculos"))
		{
			$validation = [
											'ninguno'			 => 'boolean',
											'aclaraciones' => 'max:2500'
										];
		}///domicilio_encargo





		if(($this->route('formato') == "bienes_muebles"))
		{
			$validation = [
											'ninguno'			 => 'boolean',
											'aclaraciones' => 'max:2500'
										];
		}///domicilio_encargo





		if(($this->route('formato') == "inversiones_cuentas"))
		{
			$validation = [
											'ninguno'			 => 'boolean',
											'aclaraciones' => 'max:2500'
										];
		}///domicilio_encargo





		if(($this->route('formato') == "adeudos"))
		{
			$validation = [
											'ninguno'			 => 'boolean',
											'aclaraciones' => 'max:2500'
										];
		}///domicilio_encargo





		if(($this->route('formato') == "puesto_comisiones"))
		{
			$validation = [
											'ninguno'			 => 'boolean',
											'aclaraciones' => 'max:2500'
										];
		}///domicilio_encargo





		if(($this->route('formato') == "participaciones_economicas"))
		{
			$validation = [
											'ninguno'			 => 'boolean',
											'aclaraciones' => 'max:2500'
										];
		}///domicilio_encargo





		if(($this->route('formato') == "conflicto_interes"))
		{
			$validation = [
											'publico'			 => 'boolean',
											'aclaraciones' => 'max:2500'
										];
		}///domicilio_encargo





		if(($this->route('formato') == "observaciones"))
		{
			$validation = [
											'ninguno' 			=> 'boolean',
											'observaciones' => 'required_unless:ninguno,1|max:2500',
										];
		}///observaciones





		if(($this->route('formato') == "aclaraciones"))
		{
			$validation = [
										];
		}///observaciones
		
		
		if(($this->route('formato') == "ingresos"))
		{
			$validation = [
										];
		}///observaciones


		return $validation;
	}
}
