<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerRJ6dzg5\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerRJ6dzg5/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerRJ6dzg5.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerRJ6dzg5\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerRJ6dzg5\App_KernelDevDebugContainer([
    'container.build_hash' => 'RJ6dzg5',
    'container.build_id' => '3e2f78ad',
    'container.build_time' => 1724755761,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerRJ6dzg5');
