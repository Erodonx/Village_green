<?php

namespace ContainerRJ6dzg5;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_ViXcClxService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.ViXcClx' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.ViXcClx'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'produit' => ['privates', '.errored..service_locator.ViXcClx.App\\Entity\\Produit', NULL, 'Cannot autowire service ".service_locator.ViXcClx": it needs an instance of "App\\Entity\\Produit" but this type has been excluded in "config/services.yaml".'],
        ], [
            'produit' => 'App\\Entity\\Produit',
        ]);
    }
}