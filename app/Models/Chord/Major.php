<?php

namespace App\Models\Chord;

use App\Lookup\Chord;
use App\Lookup\Interval;

/**
 * Major chord
 */
class Major extends BaseChord
{
    /**
     * @return string
     */
    public function getExtension() : string
    {
        return Chord::MAJOR;
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
        ];
    }
}
