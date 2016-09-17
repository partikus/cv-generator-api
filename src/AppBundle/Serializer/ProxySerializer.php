<?php

namespace AppBundle\Serializer;

use Doctrine\ORM\Proxy\Proxy;

class ProxySerializer
{
    public function __invoke(Proxy $proxy)
    {
        return $proxy->__load();
    }
}
