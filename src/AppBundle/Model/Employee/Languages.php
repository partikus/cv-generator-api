<?php

declare (strict_types = 1);

namespace AppBundle\Model\Employee;

use Doctrine\Common\Collections\ArrayCollection;

class Languages
{
    private $collection;

    public function __construct(array $collection = [])
    {
        $this->collection = new ArrayCollection($collection);
    }

    public function addLanguage(Language $language)
    {
        if (!$this->collection->contains($language)) {
            $this->collection->add($language);
        }
    }

    /**
     * @return ArrayCollection|Language[]
     */
    public function all() : ArrayCollection
    {
        return $this->collection;
    }
}
