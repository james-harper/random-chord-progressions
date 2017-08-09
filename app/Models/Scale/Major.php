<?php

namespace App\Models\Scale;

/**
 * Major scale
 */
class Major extends BaseScale
{
    /**
     * Use sharps instead of flats when any of these notes
     * are the root
     *
     * @var array
     */
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
