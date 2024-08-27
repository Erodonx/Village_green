<?php

namespace ContainerRJ6dzg5;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Console_Command_MessengerStopWorkers_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.console.command.messenger_stop_workers.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.console.command.messenger_stop_workers.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('messenger:stop-workers', [], 'Stop workers after their current message', false, #[\Closure(name: 'console.command.messenger_stop_workers', class: 'Symfony\\Component\\Messenger\\Command\\StopWorkersCommand')] fn (): \Symfony\Component\Messenger\Command\StopWorkersCommand => ($container->privates['console.command.messenger_stop_workers'] ?? $container->load('getConsole_Command_MessengerStopWorkersService')));
    }
}
