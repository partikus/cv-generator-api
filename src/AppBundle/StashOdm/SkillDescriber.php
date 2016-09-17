<?php

declare(strict_types = 1);

namespace AppBundle\StashOdm;

use AppBundle\Model\Skill;
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
                new \Stash\Model\Field\Id(),
                new \Stash\Model\Field\Scalar("name", Fields::TYPE_STRING),
                new \Stash\Model\Field\Scalar("type", Fields::TYPE_INTEGER),
                new \Stash\Model\Field\Scalar("description", Fields::TYPE_STRING),
                new \Stash\Model\Field\Scalar("url", Fields::TYPE_STRING),
            ]
        );
    }
}
