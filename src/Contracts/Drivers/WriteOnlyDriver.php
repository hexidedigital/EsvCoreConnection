<?php

namespace Hexide\EsvCore\Contracts\Drivers;

use src\Classes\Response;

interface WriteOnlyDriver
{
    public function store(array $data): Response;
}
