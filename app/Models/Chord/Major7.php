<?php

namespace App\Models\Chord;

use App\Lookup\Chord;
use App\Lookup\Interval;

/**
 * Major 7th chord
 */
class Major7 extends BaseChord
{
    /**
     * @return string
     */
    public function getExtension() : string
    {
        return Chord::MAJOR_7;
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
            Interval::MAJOR_SEVENTH,
        ];
    }
}
