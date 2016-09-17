<?php

declare(strict_types = 1);

namespace AppBundle\StashOdm;

use AppBundle\Model\Employee;
use ClearCode\StashODMBundle\Model\ModelDescriber;
use Stash\Fields;
use Stash\Model\Model;

class EmployeeDescriber implements ModelDescriber
{
    /**
     * @inheritdoc
     */
    public function describe() : Model
    {
        return new Model(
            Employee::class,
            [
                new \Stash\Model\Field\Id(),
                new \Stash\Model\Field\Scalar("firstName", Fields::TYPE_STRING),
                new \Stash\Model\Field\Scalar("lastName", Fields::TYPE_STRING),
                new \Stash\Model\Field\Scalar("username", Fields::TYPE_STRING),
                new \Stash\Model\Field\Scalar("email", Fields::TYPE_STRING),
                new \Stash\Model\Field\Scalar("jobTitle", Fields::TYPE_STRING),
                new \Stash\Model\Field\Document("details"),
                new \Stash\Model\Field\ArrayOf("skills", Fields::TYPE_DOCUMENT),
                new \Stash\Model\Field\ArrayOf("languages", Fields::TYPE_DOCUMENT),
                new \Stash\Model\Field\ArrayOf("projects", Fields::TYPE_DOCUMENT),
            ]
        );
    }
}