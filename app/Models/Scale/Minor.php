<?php

namespace App\Models\Scale;

class Minor extends BaseScale
{
    protected $useSharps = [
        'B', 'C#', 'D#', 'E','F#', 'G#',
    ];

    /**
     * Intervals for the minor scale
     *
     * @return string
     */
    protected function getIntervals() : string
    {
        return 'WHWWHWW';
    }
}