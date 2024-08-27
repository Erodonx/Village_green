<?php

namespace ContainerRJ6dzg5;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Maker_AutoCommand_MakeRegistrationForm_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.maker.auto_command.make_registration_form.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.maker.auto_command.make_registration_form.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('make:registration-form', [], 'Create a new registration form system', false, #[\Closure(name: 'maker.auto_command.make_registration_form', class: 'Symfony\\Bundle\\MakerBundle\\Command\\MakerCommand')] fn (): \Symfony\Bundle\MakerBundle\Command\MakerCommand => ($container->privates['maker.auto_command.make_registration_form'] ?? $container->load('getMaker_AutoCommand_MakeRegistrationFormService')));
    }
}
