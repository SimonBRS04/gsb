<?php
return [
    'Users.Social.login' => true,

    'Auth.Authenticators.Jwt' => [
        'queryParam' => 'token',
        'skipTwoFactorVerify' => true,
        'className' => 'Authentication.Jwt',
    ],

    'Auth.Authentication.serviceLoader' => \App\Loader\AppAuthenticationServiceLoader::class,
    'Auth.AuthorizationMiddleware' => $config,
    'Auth.AuthorizationComponent.enabled' => false,
    'Auth.Authorization.serviceLoader' => \App\Loader\AppAuthorizationServiceLoader::class,
];
