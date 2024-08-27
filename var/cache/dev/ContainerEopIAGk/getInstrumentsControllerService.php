<?php

namespace ContainerEopIAGk;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getInstrumentsControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\InstrumentsController' shared autowired service.
     *
     * @return \App\Controller\InstrumentsController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/InstrumentsController.php';

        $container->services['App\\Controller\\InstrumentsController'] = $instance = new \App\Controller\InstrumentsController();

        $instance->setContainer(($container->privates['.service_locator.O2p6Lk7'] ?? $container->load('get_ServiceLocator_O2p6Lk7Service'))->withContext('App\\Controller\\InstrumentsController', $container));

        return $instance;
    }
}
