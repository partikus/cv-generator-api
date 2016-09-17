<?php

namespace AppBundle\Serializer;

use AppBundle\Entity\EmployeeSkill;

class EmployeeSkillSerializer
{
    public function __invoke(EmployeeSkill $skill)
    {
        return [
            'id' => $skill->getId(),
            'startDate' => $skill->getStartDate(),
            'lastUsage' => $skill->getLastUsage(),
            'level' => $skill->getLevel(),
            'skill' => $skill->getSkill(),
        ];
    }
}
