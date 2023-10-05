<?php

namespace Hexide\EsvCore\Contracts\Drivers;

use Hexide\EsvCore\Classes\Response;

interface ReadOnlyDriver
{
    public function get(string|null $date = null): Response;
}
