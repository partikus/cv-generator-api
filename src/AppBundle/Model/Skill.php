<?php

declare (strict_types = 1);

namespace AppBundle\Model;

class Skill
{
    private $name;
    private $description;
    private $url;
    private $type;

    public function __construct(string $name, Type $skillType, string $description = null, string $url = null)
    {
        $this->name        = $name;
        $this->type        = $skillType;
        $this->description = $description;
        $this->url         = $url;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }
}
