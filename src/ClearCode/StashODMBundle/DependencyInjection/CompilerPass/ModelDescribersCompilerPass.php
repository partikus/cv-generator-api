<?php

namespace ClearCode\StashODMBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ModelDescribersCompilerPass implements CompilerPassInterface
{
    /**
     * @inheritdoc
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('stash_odm.models')) {
            return;
        }

        $elementServices = $container->findTaggedServiceIds('stash_odm.model');
        foreach ($elementServices as $id => $tag) {
            $container->findDefinition('stash_odm.models')->addMethodCall('register');
        }
    }
}