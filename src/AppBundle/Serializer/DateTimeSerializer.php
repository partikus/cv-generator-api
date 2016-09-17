<?php

namespace AppBundle\Serializer;

class DateTimeSerializer
{
    public function __invoke(\DateTime $dateTime)
    {
        return $dateTime->format(\DateTime::ISO8601);
    }
}
