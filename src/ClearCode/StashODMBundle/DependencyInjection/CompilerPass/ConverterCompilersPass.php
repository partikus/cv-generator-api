<?php

namespace ClearCode\StashODMBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ConverterCompilersPass implements CompilerPassInterface
{
    /**
     * @inheritdoc
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('stash_odm.models')) {
            return;
        }

        $elementServices = $container->findTaggedServiceIds('stash_odm.converter');
        
        foreach ($elementServices as $id => $tag) {
            $container->get('stash_odm.converter')->addType($container->get($id));
        }
    }
}