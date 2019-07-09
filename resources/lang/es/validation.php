<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'El ":attribute" debe ser aceptado.',
    'active_url'           => 'La ":attribute" URL no es válida.',
    'after'                => 'El ":attribute" debe ser una fecha después de :date.',
    'alpha'                => 'El ":attribute" sólo puede contener letras sin espacios.',
    'alpha_dash'           => 'El ":attribute" sólo puede contener letras, números, y guiones sin espacios.',
    'alpha_num'            => 'El ":attribute" sólo puede contener letras y números.',
    'array'                => 'El ":attribute" debe ser un array.',
    'before'               => 'La ":attribute" debe ser antes del :date.',
    'between'              => [
        'numeric' => 'El ":attribute" debe estar entre :min y :max.',
        'file'    => 'El ":attribute" debe estar entre :min y :max kilobytes.',
        'string'  => 'El ":attribute" debe estar entre :min y :max caracteres.',
        'array'   => 'El ":attribute" debe tener entre :min y :max valores.',
    ],
    'boolean'              => 'El campo ":attribute" debe ser verdadero o falso.',
    'confirmed'            => 'La ":attribute" confirmación no coincide.',
    'date'                 => 'La ":attribute" no es válida o bien tiene un formato incorrecto.',
    'date_format'          => 'El ":attribute" no coincide con el formato :format.',
    'different'            => 'El ":attribute" y :other debe ser diferente.',
    'digits'               => 'El ":attribute" deben ser :digits dígitos.',
    'digits_between'       => 'El ":attribute" debe ser entre :min y :max dígitos.',
    'dimensions'           => 'La ":attribute" no tiene las medidas requeridas.',
    'distinct'             => 'El ":attribute" campo tiene un valor duplicado.',
    'email'                => 'El ":attribute" debe ser un email válido.',
    'exists'               => 'La opción seleccionada en ":attribute" no existe en las opciones dadas.',
    'filled'               => 'El ":attribute" obligatorio.',
    'image'                => 'La ":attribute" no es un archivo JPG, PNG ó GIF.',
    'in'                   => 'La elección en ":attribute" no aparece en la lista de opciones válidas.',
    'in_array'             => 'El ":attribute" campo no existe en :other.',
    'integer'              => 'El ":attribute" debe ser un número.',
    'ip'                   => 'El ":attribute" debe ser una IP válida.',
    'json'                 => 'El ":attribute" debe ser un JSON válid.',
    'max'                  => [
        'numeric' => 'El ":attribute" no debe ser mayor a :max.',
        'file'    => 'El ":attribute" no debe ser más grande que :max kilobytes.',
        'string'  => 'El ":attribute" no debe tener más de :max caracteres.',
        'array'   => 'El ":attribute" no debe tener más de :max valores.',
    ],
    'mimes'                => 'El ":attribute" debe ser un archivo del tipo: :values.',
    'mimetypes'            => 'El ":attribute" debe ser un archivo válido.',
    'min'                  => [
        'numeric' => 'El ":attribute" no debe ser menor a :min.',
        'file'    => 'El ":attribute" debe tener al menos :min kilobytes.',
        'string'  => 'El ":attribute" debe tener al menos :min caracteres.',
        'array'   => 'El ":attribute" debe tener al menos :min valores.',
    ],
    'not_in'               => 'La selección es ":attribute" inválida.',
    'numeric'              => 'El campo ":attribute" debe ser un número.',
    'present'              => 'El campo ":attribute" debe estar presente.',
    'regex'                => 'El campo ":attribute" formato es inválido.',
    'required'             => 'El ":attribute" es obligatorio.',
    'required_if'          => 'El ":attribute" es requerido cuando el ":other" es :value.',
    'required_unless'      => 'El campo ":attribute" es requerido a no ser que :other esté en :values.',
    'required_with'        => 'El campo ":attribute" es requerido cuando :values está presente.',
    'required_with_all'    => 'El campo ":attribute" es requirido cuando :values está presente.',
    'required_without'     => 'El campo ":attribute" es requerido cuando :values no está presente.',
    'required_without_all' => 'El campo ":attribute" es requerido cuando ninguno de estos :values están presentes.',
    'same'                 => 'El ":attribute" y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El ":attribute" debe ser de :size.',
        'file'    => 'El ":attribute" debe ser :size kilobytes.',
        'string'  => 'El ":attribute" debe ser :size caracteres.',
        'array'   => 'El ":attribute" debe contener :size valores.',
    ],
    'string'               => 'El campo ":attribute" debe ser texto.',
    'timezone'             => 'La ":attribute" debe ser una zona horario válida.',
    'unique'               => 'El campo ":attribute" ya se encuentra en uso.',
    'url'                  => 'El campo ":attribute" tiene un formato no válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
                  'password' => [
                                  'required' => 'La "contraseña es obligatoria."',
                                ],
                ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [

      'rfc'                 => 'RFC',
      'password'            => 'contraseña',
      'ubicacion'           => 'ubicación',
      'pais'                => 'país',
      'cp'                  => 'código postal',
      'regimen_matrimonial' => 'régimen matrimonial',
      'razon_social'        => 'nombre de la empresa o razón social o sociedad',
      'area'                => 'área',
      'ambito'              => 'ámbito',
    ],
];
