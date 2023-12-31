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

    'accepted' => 'O campo :attribute deve ser aceite.',
    'accepted_if' => 'O campo :attribute deve ser aceite quando :other for :value.',
    'active_url' => 'O campo :attribute deve ser um URL válido.',
    'after' => 'O campo :attribute deve ser uma data posterior a :date.',
    'after_or_equal' => 'O campo :attribute deve ser uma data posterior ou igual a :date.',
    'alpha' => 'O campo :attribute deve conter apenas letras.',
    'alpha_dash' => 'O campo :attribute deve conter apenas letras, números, hífens e sublinhados.',
    'alpha_num' => 'O campo :attribute deve conter apenas letras e números.',
    'array' => 'O campo :attribute deve ser um array.',
    'ascii' => 'O campo :attribute deve conter apenas caracteres alfanuméricos de um byte e símbolos.',
    'before' => 'O campo :attribute deve ser uma data anterior a :date.',
    'before_or_equal' => 'O campo :attribute deve ser uma data anterior ou igual a :date.',
    'between' => [
        'array' => 'O campo :attribute deve ter entre :min e :max itens.',
        'file' => 'O campo :attribute deve estar entre :min e :max kilobytes.',
        'numeric' => 'O campo :attribute deve estar entre :min e :max.',
        'string' => 'O campo :attribute deve ter entre :min e :max caracteres.',
    ],
    'boolean' => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed' => 'A confirmação do campo :attribute não corresponde.',
    'current_password' => 'A senha está incorreta.',
    'date' => 'O campo :attribute deve ser uma data válida.',
    'date_equals' => 'O campo :attribute deve ser uma data igual a :date.',
    'date_format' => 'O campo :attribute deve corresponder ao formato :format.',
    'decimal' => 'O campo :attribute deve ter :casas decimais decimais.',
    'declined' => 'O campo :attribute deve ser recusado.',
    'declined_if' => 'O campo :attribute deve ser recusado quando :other for :value.',
    'different' => 'O campo :attribute e :other devem ser diferentes.',
    'digits' => 'O campo :attribute deve ser :dígitos dígitos.',
    'digits_between' => 'O campo :attribute deve estar entre :min e :max dígitos.',
    'dimensions' => 'O campo :attribute tem dimensões de imagem inválidas.',
    'distinct' => 'O campo :attribute tem um valor duplicado.',
    'doesnt_end_with' => 'O campo :attribute não deve terminar com um dos seguintes: :values.',
    'doesnt_start_with' => 'O campo :attribute não deve começar com um dos seguintes: :values.',
    'email' => 'O campo :attribute deve ser um endereço de e-mail válido.',
    'ends_with' => 'O campo :attribute deve terminar com um dos seguintes: :values.',
    'enum' => 'O :attribute selecionado é inválido.',
    'exists' => 'O :attribute selecionado é inválido.',
    'file' => 'O campo :attribute deve ser um arquivo.',
    'filled' => 'O campo :attribute deve ter um valor.',
    'gt' => [
        'array' => 'O campo :attribute deve ter mais de itens :value.',
        'file' => 'O campo :attribute deve ser maior que :value kilobytes.',
        'numeric' => 'O campo :attribute deve ser maior que :value.',
        'string' => 'O campo :attribute deve ser maior que os caracteres :value.',
    ],
    'gte' => [
        'array' => 'The :attribute field must have :value items or more.',
        'file' => 'O campo :attribute deve ser maior ou igual a :value kilobytes.',
        'numeric' => 'O campo :attribute deve ser maior ou igual a :value.',
        'string' => 'O campo :attribute deve ser maior ou igual a :value caracteres.',
    ],
    'image' => 'O campo :attribute deve ser uma imagem.',
    'in' => 'O :attribute selecionado é inválido.',
    'in_array' => 'O campo :attribute deve existir em :other.',
    'integer' => 'O campo :attribute deve ser um número inteiro.',
    'ip' => 'O campo :attribute deve ser um endereço IP válido.',
    'ipv4' => 'O campo :attribute deve ser um endereço IPv4 válido.',
    'ipv6' => 'O campo :attribute deve ser um endereço IPv6 válido.',
    'json' => 'O campo :attribute deve ser uma string JSON válida.',
    'lowercase' => 'O campo :attribute deve estar em letras minúsculas.',
    'lt' => [
        'array' => 'O campo :attribute deve ter itens menores que :value.',
        'file' => 'O campo :attribute deve ser menor que :value kilobytes.',
        'numeric' => 'O campo :attribute deve ser menor que :value.',
        'string' => 'O campo :attribute deve ter menos de :value caracteres.',
    ],
    'lte' => [
        'array' => 'The :attribute field must not have more than :value items.',
        'file' => 'The :attribute field must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute field must be less than or equal to :value.',
        'string' => 'The :attribute field must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute field must be a valid MAC address.',
    'max' => [
        'array' => 'The :attribute field must not have more than :max items.',
        'file' => 'The :attribute field must not be greater than :max kilobytes.',
        'numeric' => 'The :attribute field must not be greater than :max.',
        'string' => 'The :attribute field must not be greater than :max characters.',
    ],
    'max_digits' => 'The :attribute field must not have more than :max digits.',
    'mimes' => 'The :attribute field must be a file of type: :values.',
    'mimetypes' => 'The :attribute field must be a file of type: :values.',
    'min' => [
        'array' => 'The :attribute field must have at least :min items.',
        'file' => 'The :attribute field must be at least :min kilobytes.',
        'numeric' => 'The :attribute field must be at least :min.',
        'string' => 'The :attribute field must be at least :min characters.',
    ],
    'min_digits' => 'The :attribute field must have at least :min digits.',
    'missing' => 'The :attribute field must be missing.',
    'missing_if' => 'The :attribute field must be missing when :other is :value.',
    'missing_unless' => 'The :attribute field must be missing unless :other is :value.',
    'missing_with' => 'The :attribute field must be missing when :values is present.',
    'missing_with_all' => 'The :attribute field must be missing when :values are present.',
    'multiple_of' => 'The :attribute field must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute field format is invalid.',
    'numeric' => 'The :attribute field must be a number.',
    'password' => [
        'letters' => 'The :attribute field must contain at least one letter.',
        'mixed' => 'The :attribute field must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute field must contain at least one number.',
        'symbols' => 'The :attribute field must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute field format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute field must match :other.',
    'size' => [
        'array' => 'O campo :attribute deve conter itens :size.',
        'file' => 'O campo :attribute deve ser :size kilobytes.',
        'numeric' => 'O campo :attribute deve ser :size.',
        'string' => 'O campo :attribute deve ter caracteres :size.',
    ],
    'starts_with' => 'The :attribute field must start with one of the following: :values.',
    'string' => 'The :attribute field must be a string.',
    'timezone' => 'The :attribute field must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'uppercase' => 'The :attribute field must be uppercase.',
    'url' => 'O campo :attribute deve ser um URL válido.',
    'ulid' => 'The :attribute field must be a valid ULID.',
    'uuid' => 'The :attribute field must be a valid UUID.',

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
        'dataNascimento' => [
            'required' => 'A data de nascimento é obrigatória.',
            'date' => 'A data de nascimento deve ser uma data válida.',
            'before_or_equal' => 'A data de nascimento deve ser maior que 17.',
        ],
        'name' => [
            'required' => 'O campo nome é obrigatório.',
        ],
        'email' => [
            'required' => 'O campo email é obrigatório.',
            'email' => 'O campo email deve ser um endereço de email válido.',
            'unique' => 'Este endereço de email já está em uso.',
        ],
        'password' => [
            'required' => 'O campo senha é obrigatório.',
            'min' => 'A senha deve ter pelo menos 8 caracteres.',
            'confirmed' => 'A confirmação da senha não corresponde.',
        ],
        'nif' => [
            'required' => 'O campo NIF é obrigatório.',
            'numeric' => 'O campo NIF deve ser numérico.',
            'digits' => 'O campo NIF deve ter 9 dígitos.',
            'unique' => 'Este NIF já está em uso.',
        ],
        'telemovel' => [
            'required' => 'O campo telemóvel é obrigatório.',
            'numeric' => 'O campo telemóvel deve ser numérico.',
            'regex' => 'O campo telemóvel deve ser um número português.',
            'unique' => 'Este número de telemóvel já está em uso.',
        ],
        'bilheteIdentidade' => [
            'required' => 'O campo bilhete de identidade é obrigatório.',
        ],
        'morada' => [
            'required' => 'O campo morada é obrigatório.',
        ],
        'avatar' => [
            'image' => 'O campo avatar deve ser uma imagem.',
            'mimes' => 'O campo avatar deve ser um arquivo do tipo jpeg, bmp, svg, png.',
            'max' => 'O tamanho máximo permitido para o arquivo é de 5MB.',
        ],
        'emprego' => [
            'required' => 'O campo emprego é obrigatório.',
        ],
        'profissao' => [
            'required' => 'O campo profissão é obrigatório.',
        ],
        'empresa' => [
            'required' => 'O campo empresa é obrigatório.',
        ],
        'naturalidade' => [
            'required' => 'O campo naturalidade é obrigatório.',
        ],
        'nivel' => [
            'required' => 'O campo nível é obrigatório.',
        ],
        'curso' => [
            'required' => 'O campo curso é obrigatório.',
        ],
        'estabelecimentoEnsino' => [
            'required' => 'O campo estabelecimento de ensino é obrigatório.',
        ],
        'titulo_publicacao1' => [
            'required' => 'O campo título da publicação 1 é obrigatório.',
        ],
        'link_publicacao1' => [
            'required' => 'O campo link da publicação 1 é obrigatório.',
            'url' => 'O campo link da publicação 1 deve ser uma URL válida.',
        ],
        'titulo_publicacao2' => [
            'required' => 'O campo título da publicação 2 é obrigatório.',
        ],
        'link_publicacao2' => [
            'required' => 'O campo link da publicação 2 é obrigatório.',
            'url' => 'O campo link da publicação 2 deve ser uma URL válida.',
        ],
        'titulo_publicacao3' => [
            'required' => 'O campo título da publicação 3 é obrigatório.',
        ],
        'link_publicacao3' => [
            'required' => 'O campo link da publicação 3 é obrigatório.',
            'url' => 'O campo link da publicação 3 deve ser uma URL válida.',
        ],
        'titulo_publicacao4' => [
            'required' => 'O campo título da publicação 4 é obrigatório.',
        ],
        'link_publicacao4' => [
            'required' => 'O campo link da publicação 4 é obrigatório.',
            'url' => 'O campo link da publicação 4 deve ser uma URL válida.',
        ],
        'nib' => [
            'required' => 'O campo NIB é obrigatório.',
            'numeric' => 'O campo NIB deve ser numérico.',
            'digits' => 'O campo NIB deve ter 21 dígitos.',
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
