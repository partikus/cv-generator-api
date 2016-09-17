<?php

declare (strict_types = 1);

namespace AppBundle\Model;

use AppBundle\Model\Exception\InvalidSkillTypeException;

class Type
{
    const TYPE_LANGUAGE = 1;
    const TYPE_FRAMEWORK = 2;
    const TYPE_DATABASE = 3;
    const TYPE_TOOL = 4;
    const TYPE_VCS = 5;
    const TYPE_OS = 6;

    private $type;

    public function __construct(int $type)
    {
        if (!in_array($type, self::getTypes())) {
            throw new InvalidSkillTypeException();
        }

        $this->type = $type;
    }

    public function getType() : int
    {
        return $this->type;
    }

    public static function getTypes() : array
    {
        return [
            self::TYPE_LANGUAGE,
            self::TYPE_FRAMEWORK,
            self::TYPE_DATABASE,
            self::TYPE_TOOL,
            self::TYPE_VCS,
            self::TYPE_OS,
        ];
    }
}