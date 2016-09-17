<?php

namespace ClearCode\StashODMBundle;

use ClearCode\StashODMBundle\DependencyInjection\ModelDescribersCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ClearCodeStashODMBundle extends Bundle
{
    /**
     * @inheritdoc
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new ModelDescribersCompilerPass());
    }
}
