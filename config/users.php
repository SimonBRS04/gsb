<?php
return [
    'Users.Social.login' => true,

    'Auth.Authenticators.Jwt' => [
        'queryParam' => 'token',
        'skipTwoFactorVerify' => true,
        'className' => 'Authentication.Jwt',
    ],

    'Auth.Authentication.serviceLoader' => \App\Loader\AppAuthenticationServiceLoader::class,
];
