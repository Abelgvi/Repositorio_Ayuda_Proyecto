<?php

return [

    // Conexión LDAP que usará Laravel
    'connection' => env('LDAP_CONNECTION', 'default'),

    // Usamos el proveedor de base de datos
    'provider' => Adldap\Laravel\Auth\DatabaseUserProvider::class,

    // Modelo de usuario de Laravel
    'model' => App\Models\User::class,

    // Reglas de validación
    'rules' => [
        Adldap\Laravel\Validation\Rules\DenyTrashed::class,
    ],

    // Scopes (no usamos ninguno)
    'scopes' => [],

    // Identificadores de usuario
    'identifiers' => [

        'ldap' => [
            // Tus usuarios se buscan por uid
            'locate_users_by' => 'uid',

            // Y también se autentican por uid
            'bind_users_by' => 'uid',
        ],

        // Laravel seguirá usando email internamente,
        // pero no se usará para buscar en LDAP.
        'eloquent' => 'email',
    ],

    // Contraseñas
    'passwords' => [
        // No sincronizamos contraseñas a MySQL
        'sync' => false,
        'column' => 'password',
    ],

    // Si LDAP falla, no usar login local
    'login_fallback' => false,

    // Atributos que se sincronizan desde LDAP a MySQL
    'sync_attributes' => [
        'name' => 'cn',
        // Si tus usuarios no tienen email, deja esto comentado:
        // 'email' => 'mail',
    ],

    // Logging desactivado
    'logging' => [
        'enabled' => false,
        'events' => [],
    ],
];