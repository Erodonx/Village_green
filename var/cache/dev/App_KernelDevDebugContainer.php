<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerCYbSeJg\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerCYbSeJg/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerCYbSeJg.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerCYbSeJg\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerCYbSeJg\App_KernelDevDebugContainer([
    'container.build_hash' => 'CYbSeJg',
    'container.build_id' => '7fb26ef7',
    'container.build_time' => 1724764593,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerCYbSeJg');
