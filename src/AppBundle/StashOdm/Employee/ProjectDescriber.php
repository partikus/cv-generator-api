<?php

declare(strict_types = 1);

namespace AppBundle\StashOdm\Employee;

use AppBundle\Model\Employee\Project;
use ClearCode\StashODMBundle\Model\ModelDescriber;
use Stash\Fields;
use Stash\Model\Model;

class ProjectDescriber implements ModelDescriber
{
    /**
     * @inheritdoc
     */
    public function describe() : Model
    {
        return new Model(
            Project::class,
            [
                new \Stash\Model\Field\Id(),
                new \Stash\Model\Field\Scalar("company", Fields::TYPE_STRING),
                new \Stash\Model\Field\Scalar("role", Fields::TYPE_STRING),
                new \Stash\Model\Field\Scalar("responsibilities", Fields::TYPE_STRING),
                new \Stash\Model\Field\Scalar("description", Fields::TYPE_STRING),
                new \Stash\Model\Field\Scalar("startDate", Fields::TYPE_DATE),
                new \Stash\Model\Field\Scalar("endDate", Fields::TYPE_DATE),
                new \Stash\Model\Field\ArrayOf("skills", Fields::TYPE_DOCUMENT),
            ]
        );
    }
}
