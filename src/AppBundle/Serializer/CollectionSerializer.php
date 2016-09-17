<?php

namespace AppBundle\Serializer;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Persistence\Proxy;

class CollectionSerializer
{
    public function __invoke(Collection $collection)
    {
        if ($collection instanceof Proxy) {
            $collection->__load();
        }

        return $collection->toArray();
    }
}
