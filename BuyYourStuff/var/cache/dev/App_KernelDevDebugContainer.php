<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container753DX62\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container753DX62/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container753DX62.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container753DX62\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container753DX62\App_KernelDevDebugContainer([
    'container.build_hash' => '753DX62',
    'container.build_id' => '905cd60c',
    'container.build_time' => 1585737805,
], __DIR__.\DIRECTORY_SEPARATOR.'Container753DX62');
