<?php

declare (strict_types = 1);

namespace AppBundle\Model;

class Skill
{
    private $name;
    private $description;
    private $url;

    public function __construct(string $name, string $description, string $url)
    {
        $this->name = $name;
        $this->description = $description;
        $this->url = $url;
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
