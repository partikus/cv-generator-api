<?php

declare(strict_types = 1);

namespace AppBundle\StashOdm\Employee;

use AppBundle\Model\Employee\Project;
use AppBundle\Model\Employee\Skill;
use ClearCode\StashODMBundle\Model\ModelDescriber;
use Stash\Fields;
use Stash\Model\Model;

class SkillDescriber implements ModelDescriber
{
    /**
     * @inheritdoc
     */
    public function describe() : Model
    {
        return new Model(
            Skill::class,
            [
                new \Stash\Model\Field\Document("skill"),
                new \Stash\Model\Field\Scalar("startDate", Fields::TYPE_DATE),
                new \Stash\Model\Field\Scalar("lastUsage", Fields::TYPE_DATE),
                new \Stash\Model\Field\Scalar("level", Fields::TYPE_INTEGER),
            ]
        );
    }
}
