<?php

namespace AppBundle\Serializer;

use AppBundle\Entity\Language;

class LanguageSerializer
{
    public function __invoke(Language $language)
    {
        return [
            'id' => $language->getId(),
            'iso3' => $language->getIso3(),
            'name' => $language->getName(),
        ];
    }
}