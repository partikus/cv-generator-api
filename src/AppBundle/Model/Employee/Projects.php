<?php

declare (strict_types = 1);

namespace AppBundle\Model\Employee;

use Doctrine\Common\Collections\ArrayCollection;

class Projects
{
    private $collection;

    public function __construct(array $collection = [])
    {
        $this->collection = new ArrayCollection($collection);
    }

    public function addProject(Project $project)
    {
        if (!$this->collection->contains($project)) {
            $this->collection->add($project);
        }
    }
}
