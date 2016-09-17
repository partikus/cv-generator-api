<?php

namespace ClearCode\StashODMBundle;

use ClearCode\StashODMBundle\DependencyInjection\CompilerPass\ConverterCompilersPass;
use ClearCode\StashODMBundle\DependencyInjection\CompilerPass\ModelDescribersCompilerPass;
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
        $container->addCompilerPass(new ConverterCompilersPass());
    }
}
