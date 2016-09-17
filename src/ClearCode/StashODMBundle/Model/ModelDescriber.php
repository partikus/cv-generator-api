<?php

namespace ClearCode\StashODMBundle\Model;

use Stash\Model\Model;

interface ModelDescriber
{
    public function describe() : Model;
}
