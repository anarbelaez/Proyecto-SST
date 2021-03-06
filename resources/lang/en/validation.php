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

    'accepted' => 'The :attribute must be accepted.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal to :value.',
        'file' => 'The :attribute must be greater than or equal to :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal to :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'string' => 'The :attribute must be less than or equal to :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute must not be greater than :max.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'string' => 'The :attribute must not be greater than :max characters.',
        'array' => 'The :attribute must not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

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

        //Usuarios
        'nombre' => [
            'required' => 'El nombre del usuario es obligatorio.',
        ],

        'apellido' => [
            'required' => 'El apellido del usuario es obligatorio.',
        ],

        'cedula' => [
            'required' => 'La c??dula del usuario es obligatoria.',
            'numeric' => 'La c??dula del usuario debe contener solo n??meros.',
            'unique' => 'El n??mero de documento de identidad del usuario debe ser ??nico.',
        ],

        'telefono' => [
            'numeric' => 'El tel??fono del usuario debe contener solo n??meros.',
        ],

        'celular' => [
            'numeric' => 'El celular del usuario debe contener solo n??meros.',
        ],

        'direccion' => [
            'required' => 'Ingrese la direcci??n del usuario.',
        ],

        'correo' => [
            'required' => 'Ingrese la direcci??n de correo electr??nico del usuario.',
            'email' => 'Debe ser una direcci??n de correo electr??nico v??lida.',
        ],

        'role' => [
            'required' => 'El rol del usuario es requerido.',
            'in' => 'Seleccione el rol del usuario.',
        ],

        //Encargado SST
        'nombre_empleado' => [
            'required' => 'Ingrese el nombre del empleado.',
        ],

        'apellidos_empleado' => [
            'required' => 'Ingrese el apellido del empleado.',
        ],

        'documento_identidad' => [
            'required' => 'Ingrese el n??mero de documento de identidad del empleado.',
            'unique' => 'Ya existe un empleado identificado con este n??mero de documento de identidad.',
        ],

        'nivel_estudio' => [
            'in' => 'Seleccione el nivel de estudios del empleado.',
        ],

        'hdv' => [
            'required' => 'Ingrese la hoja de vida del empleado.',
            'mimes' => 'El documento debe ser en formato PDF.',
        ],

        'diploma' => [
            'required' => 'Ingrese el diploma de estudios del empleado.',
            'mimes' => 'El documento debe ser en formato PDF.',
        ],

        'certisalud' => [
            'required' => 'Ingrese el certificado de salud del empleado.',
            'mimes' => 'El documento debe ser en formato PDF.',
        ],

        'curso50h' => [
            'required' => 'Ingrese el certificado del curso de 50 horas del empleado.',
            'mimes' => 'El documento debe ser en formato PDF.',
        ],

        //Empresa - Update
        'nombre_empresa' => [
            'required' => 'El nombre de la empresa es obligatorio.',
        ],

        'nit' => [
            'required' => 'El NIT de la empresa es obligatorio.',
            'numeric' => 'El NIT de la empresa debe contener solo n??meros.'
        ],

        'actividad_economica' => [
            'required' => 'Ingrese la actividad econ??mica de la empresa.',
        ],

        'tipo_empresa' => [
            'required' => 'Ingrese el tipo de empresa.',
        ],

        'nivel_riesgo' => [
            'in' => 'Seleccione el nivel de riesgo de la empresa.',
        ],

        'cantidad_trabajadores' => [
            'required' => 'Ingrese la cantidad de empleados.',
            'numeric' => 'Ingrese solo n??meros.',
        ],

        'naturaleza_juridica' => [
            'required' => 'Ingrese la naturaleza jur??dica de la empresa.',
        ],

        'correo_electronico' => [
            'required' => 'Ingrese la direcci??n de correo electr??nico de la empresa.',
            'email' => 'Debe ser una direcci??n de correo electr??nico v??lida.',
        ],

        'direccion_empresa' => [
            'required' => 'Ingrese la direcci??n de la empresa.',
        ],

        'telefono1' => [
            'required' => 'Ingrese la direccion de la empresa.',
            'numeric' => 'Ingrese solo n??meros.',
        ],

        //Documentos de la empresa
        'titulo' => [
            'required' => 'Ingrese el t??tulo del documento.',
        ],

        'tipodocumento' => [
            'in' => 'Seleccione el tipo de documento.',
        ],

        'descripcion' => [
            'required' => 'Ingrese la descripci??n del documento.',
        ],

        'documento' => [
            'required' => 'Seleccione el documento.',
            'mimes' => 'El documento debe ser en formato PDF.',
        ],

        //Aliados estrategicos
        'nombre_proveedor' => [
            'required' => 'Ingrese el nombre de la empresa.',
        ],

        'nit' => [
            'required' => 'El NIT de la empresa es obligatorio.',
            'numeric' => 'El NIT de la empresa debe contener solo n??meros.',
            'unique' => 'Ya existe una empresa identificada con este NIT.',
        ],

        'arl' => [
            'required' => 'Ingrese la ARL de la empresa',
        ],

        'certificado_arl' => [
            'required' => 'Seleccione el documento.',
            'mimes' => 'El documento debe ser en formato PDF.',
        ],

        'seguridad_social' => [
            'required' => 'Seleccione el documento.',
            'mimes' => 'El documento debe ser en formato PDF.',
        ],

        //Fichas de seguridad
        'producto' => [
            'not_in' => 'Seleccione el producto.',
        ],

        'proveedor' => [
            'not_in' => 'Seleccione el proveedor del producto.',
        ],

        'descripcion_fs' => [
            'required' => 'Escriba una breve descripci??n de la ficha de seguridad.',
        ],

        'fichadeseguridad' => [
            'required' => 'Seleccione el documento.',
            'mimes' => 'El documento debe ser en formato PDF.',
        ],

        //Miembros comite
        'nombre_miembro' => [
            'required' => 'Ingrese el nombre del integrante del comit??.',
        ],

        'apellidos_miembro' => [
            'required' => 'Ingrese los apellidos del integrante del comit??.',
        ],

        'cedula_miembro' => [
            'required' => 'Ingrese el n??mero de documento de identidad del integrante.',
            'numeric' => 'El documento de identidad debe contener solo n??meros.',
            'unique' => '??Ya existe un integrante con este n??mero de identificaci??n!',
        ],

        'telefono_miembro' => [
            'required' => 'Ingrese un n??mero telef??nico.',
            'numeric' => 'Ingrese solo n??meros.',
        ],

        'correo_miembro' => [
            'required' => 'Ingrese una direcci??n de correo electr??nico v??lida.',
            'email' => 'Ingrese una direcci??n de correo electr??nico v??lida.',
        ],

        'cargo' => [
            'in' => 'Seleccione el cargo del integrante.',
        ],

        //Postulantes a la Brigada de Emergencia
        'nombre_postulante' => [
            'required' => 'Ingrese el nombre del postulante.',
        ],

        'apellidos_postulante' => [
            'required' => 'Ingrese los apellidos del postulante.',
        ],

        'cedula_postulante' => [
            'required' => 'Ingrese el n??mero de documento de identidad del postulante.',
            'numeric' => 'El documento de identidad debe contener solo n??meros.',
            'unique' => '??Ya existe un postulante con este n??mero de identificaci??n!',
        ],

        'telefono_postulante' => [
            'required' => 'Ingrese un n??mero telef??nico.',
            'numeric' => 'Ingrese solo n??meros.',
        ],

        'correo_postulante' => [
            'required' => 'Ingrese una direcci??n de correo electr??nico v??lida.',
            'email' => 'Ingrese una direcci??n de correo electr??nico v??lida.',
        ],

        'area_empresa' => [
            'required' => 'Ingrese el ??rea de la empresa.',
        ],

        'fecha_ingreso' => [
            'required' => 'Ingrese la fecha de ingreso del postulante a la empresa.',
        ],

        'experiencia_brigadas' => [
            'required' => 'Seleccione una opci??n.',
        ],

        'hdv_postulante' => [
            'required' => 'Ingrese la hoja de vida del postulante.',
            'mimes' => 'Solo se admiten documentos en formato pdf.',
        ],

        //Actas de reuniones
        'lider' => [
            'not_in' => 'Seleccione el l??der de la reuni??n.',
        ],

        'fecha_reunion' => [
            'required' => 'Ingrese la fecha en la que se realiz?? la reuni??n.',
        ],

        'hora_inicio' => [
            'required' => 'Ingrese la hora inicial de la reuni??n.',
        ],

        'hora_final' => [
            'required' => 'Ingrese la hora de finalizaci??n de la reuni??n.',
        ],

        'lugar_reunion' => [
            'required' => 'Ingrese el lugar en donde se realiz?? la reuni??n.',
        ],

        'descripcion_reunion' => [
            'required' => 'Escriba una breve descripci??n de los temas tratados en la reuni??n.',
        ],

        'acta_reunion' => [
            'required' => 'Ingrese el acta de la reuni??n.',
            'mimes' => 'Solo se admiten documentos en formato pdf.',
        ],

        //Actas de nombramientos
        'lider' => [
            'not_in' => 'Seleccione el l??der de la reuni??n.',
        ],

        'fecha_nombramiento' => [
            'required' => 'Ingrese la fecha del nombramiento.',
        ],

        'titulo_nombramiento' => [
            'required' => 'Ingrese el objetivo del nombramiento.',
        ],

        'descripcion_nombramiento' => [
            'required' => 'Escriba una breve descripci??n del nombramiento.',
        ],

        'acta_nombramiento' => [
            'required' => 'Ingrese el acta del nombramiento.',
            'mimes' => 'Solo se admiten documentos en formato pdf.',
        ],

        //Quejas laborales
        'cedula_empleado' => [
            'required' => 'Ingrese el n??mero de documento de identidad del empleado.',
            'numeric' => 'El documento de identidad debe contener solo n??meros.',
            'unique' => '??Ya existe un empleado con este n??mero de identificaci??n!',
        ],

        'telefono_empleado' => [
            'required' => 'Ingrese un n??mero telef??nico.',
            'nnumeric' => 'El n??mero telef??nico solo debe contener n??meros.',
        ],

        'correo_empleado' => [
            'required' => 'Ingrese una direcci??n de correo electr??nico v??lida.',
            'email' => 'Ingrese una direcci??n de correo electr??nico v??lida.',
        ],

        'cargo_empleado' => [
            'required' => 'Ingrese el cargo del empleado.',
        ],

        'fecha_diligenciamiento' => [
            'required' => 'Ingrese la fecha en la que se diligenci?? la queja laboral.',
        ],

        'queja_laboral' => [
            'required' => 'Ingrese la queja laboral diligenciada por el empleado.',
            'mimes' => 'Solo se admiten documentos en formato pdf.',
        ],

        //Actas de votacion
        'fecha_votacion' => [
            'required' => 'Ingrese la fecha en la que se realiz?? la votaci??n.',
        ],

        'lugar_votacion' => [
            'required' => 'Ingrese el lugar en donde se realiz?? la votaci??n.',
        ],

        'objetivo_votacion' => [
            'required' => 'Ingrese el objetivo de la votaci??n.',
        ],

        'votos' => [
            'required' => 'Ingrese el n??mero de votos.',
            'numeric' => 'Solo se admiten n??meros.',
        ],

        'votos_blanco' => [
            'required' => 'Ingrese el n??mero de votos en blanco.',
            'numeric' => 'Solo se admiten n??meros.',
        ],

        'descripcion_votacion' => [
            'required' => 'Explique brevemente los resultados de la votaci??n.',
        ],

        'acta_votacion' => [
            'required' => 'Ingrese el acta de la votaci??n.',
            'mimes' => 'Solo se admiten documentos en formato pdf.',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
