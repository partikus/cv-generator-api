<?php

namespace AppBundle\Serializer;

use AppBundle\Entity\EmployeeLanguage;

class EmployeeLanguageSerializer
{
    public function __invoke(EmployeeLanguage $language)
    {
        return [
            'id' => $language->getId(),
            'level' => $language->getLevel(),
            'language' => $language->getLanguage(),
        ];
    }
}
