<?php

namespace Hexide\EsvCore\Contracts\Drivers;

use Hexide\EsvCore\Classes\Response;

interface WriteOnlyDriver
{
    public function store(array $data): Response;
}
