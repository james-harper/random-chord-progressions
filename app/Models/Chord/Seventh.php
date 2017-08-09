<?php

namespace App\Models\Chord;

use App\Lookup\Chord;
use App\Lookup\Interval;

/**
 * Dominant 7th chord
 */
class Seventh extends BaseChord
{
    /**
     * @return string
     */
    public function getExtension() : string
    {
        return Chord::SEVENTH;
    }

    /**
     * @return array
     */
    protected function getIntervals() : array
    {
        return [
            Interval::ROOT,
            Interval::MAJOR_THIRD,
            Interval::FIFTH,
            Interval::MINOR_SEVENTH,
        ];
    }
}
