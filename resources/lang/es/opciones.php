<?php

/*
|--------------------------------------------------------------------------
| Etiquetas Globales Opciones
|--------------------------------------------------------------------------
|
| The following language lines are used during authentication for various
| messages that we need to display to the user. You are free to modify
| these language lines according to your application's requirements.
|
*/
$opciones_select = [

    'trivial' => [
        ''=> '',
        '0' => 'No',
        '1' => 'Sí',
    ],

    'genero' => [''   => '',
        'M' => 'Masculino',
        'F' => 'Femenino',
        'I' => 'No definido',
    ],

    'rh' => ['' => '',
            'O-' => 'O negativo',
            'O+' => 'O positivo',
            'A-' => 'A negativo',
            'A+' => 'A positivo',
            'B-' => 'B negativo',
            'B+' => 'B positivo',
            'AB-' => 'AB negativo',
            'AB+' => 'AB positivo',
            'I' => 'No específico '
    ],

];



return $opciones_select;

