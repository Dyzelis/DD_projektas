<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerLzZQzGr\srcDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerLzZQzGr/srcDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerLzZQzGr.legacy');

    return;
}

if (!\class_exists(srcDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerLzZQzGr\srcDevDebugProjectContainer::class, srcDevDebugProjectContainer::class, false);
}

return new \ContainerLzZQzGr\srcDevDebugProjectContainer(array(
    'container.build_hash' => 'LzZQzGr',
    'container.build_id' => 'cce74da1',
    'container.build_time' => 1523988903,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerLzZQzGr');
