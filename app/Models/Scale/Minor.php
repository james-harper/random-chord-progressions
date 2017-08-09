<?php

namespace App\Models\Scale;

/**
 * Minor scale
 */
class Minor extends BaseScale
{
    /**
     * Use sharps instead of flats when any of these notes
     * are the root
     *
     * @var array
     */
    protected $useSharps = [
        'A', 'B', 'C#', 'D#', 'E','F#', 'G#',
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
