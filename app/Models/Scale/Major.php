<?php

namespace App\Models\Scale;

class Major extends BaseScale
{
    protected $useSharps = [
        'A', 'B', 'D', 'E', 'F#', 'G',
    ];

    /**
     * Intervals for the major scale
     *
     * @return string
     */
    protected function getIntervals() : string
    {
        return 'WWHWWWH';
    }
}