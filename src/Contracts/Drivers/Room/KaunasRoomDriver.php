<?php

namespace Hexide\EsvCore\Contracts\Drivers\Room;

use Hexide\EsvCore\Classes\Response;
use  Hexide\EsvCore\Contracts\Drivers\ReadOnlyDriver;

interface KaunasRoomDriver extends ReadOnlyDriver
{
    public function getRoomsByReception($reception_cid): Response;

    public function getReceptionByRoom($room_cid): Response;
}
