<?php

declare (strict_types = 1);

namespace AppBundle\Model\Employee;

use Doctrine\Common\Collections\ArrayCollection;

class Skills
{
    private $collection;

    public function __construct(array $collection = [])
    {
        $this->collection = new ArrayCollection($collection);
    }

    public function addSkill(Skill $skill)
    {
        if (!$this->collection->contains($skill)) {
            $this->collection->add($skill);
        }
    }
}
