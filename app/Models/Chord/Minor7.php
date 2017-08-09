<?php

namespace App\Models\Chord;

use App\Lookup\Chord;
use App\Lookup\Interval;

/**
 * Minor 7th chord
 */
class Minor7 extends BaseChord
{
    /**
     * @return string
     */
    public function getExtension() : string
    {
        return Chord::MINOR_7;
    }

    /**
     * @return array
     */
    protected function getIntervals() : array
    {
        return [
            Interval::ROOT,
            Interval::MINOR_THIRD,
            Interval::FIFTH,
            Interval::MINOR_SEVENTH,
        ];
    }
}
