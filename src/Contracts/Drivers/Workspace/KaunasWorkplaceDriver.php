<?php

namespace Hexide\EsvCore\Contracts\Drivers\Workspace;

use  Hexide\EsvCore\Contracts\Drivers\ReadOnlyDriver;

interface KaunasWorkplaceDriver
{
    public function get($roomId, $practitionerId);
}
