<?php

namespace AppBundle\Serializer;

use AppBundle\Entity\Skill;

class SkillSerializer
{
    public function __invoke(Skill $skill)
    {
        return [
            'id' => $skill->getId(),
            'name' => $skill->getName(),
            'description' => $skill->getDescription(),
            'url' => $skill->getUrl(),
        ];
    }
}