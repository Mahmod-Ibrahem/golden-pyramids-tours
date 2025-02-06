<?php

namespace App\Traits;

trait Utility {

    public function removeAnchorTareget(mixed $data)
    {
        return str_replace('target="_blank"', '', $data);

    }
}
