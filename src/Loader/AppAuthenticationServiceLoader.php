<?php
namespace App\Loader;

use \CakeDC\Users\Loader\AuthenticationServiceLoader;

class AppAuthenticationServiceLoader extends AuthenticationServiceLoader
{
    /**
     * Load the authenticators with my custom condition
     *
     * @param \CakeDC\Auth\Authentication\AuthenticationService $service Authentication service to load identifiers
     *
     * @return void
     */
    protected function loadAuthenticators($service)
    {
        parent::loadAuthenticators($service);

        if (\Cake\Core\Configure::read('MyApp.enabledCustom')) {
            $service->loadAuthenticator('MyCustom', []);
        }
    }
}