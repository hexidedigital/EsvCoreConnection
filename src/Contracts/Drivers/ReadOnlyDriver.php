<?php

namespace Hexide\EsvCore\Contracts\Drivers;

use src\Classes\Response;

interface ReadOnlyDriver
{
    public function get(string|null $date = null): Response;
}
