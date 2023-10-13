<?php
namespace App\Loader;

use \CakeDC\Users\Loader\AuthorizationServiceLoader;

class AppAuthorizationServiceLoader
{
    /**
     * Load the authorization service with OrmResolver and Map Resolver for RbacPolicy
     *
     * @param ServerRequestInterface $request The request.
     * @return AuthorizationService
     */
    public function __invoke(ServerRequestInterface $request)
    {
        $orm = new OrmResolver();

        $resolver = new ResolverCollection([
            $map,
            $orm
        ]);

        return new AuthorizationService($resolver);
    }
}