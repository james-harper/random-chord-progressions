<?php

namespace App\Models\Scale;

/**
 * Chromatic scale
 */
class Chromatic extends BaseScale
{
    /**
     * @return string
     */
    protected function getIntervals() : string
    {
        return 'HHHHHHHHHHHH';
    }
}
