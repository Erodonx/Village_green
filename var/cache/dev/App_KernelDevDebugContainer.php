<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerOy6SoMa\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerOy6SoMa/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerOy6SoMa.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerOy6SoMa\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerOy6SoMa\App_KernelDevDebugContainer([
    'container.build_hash' => 'Oy6SoMa',
    'container.build_id' => 'aacfb058',
    'container.build_time' => 1724851556,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerOy6SoMa');
