<?php

namespace App\Models\Chord;

use App\Lookup\Chord;
use App\Lookup\Interval;

/**
 * Minor chord
 */
class Minor extends BaseChord
{
    /**
     * @return string
     */
    public function getExtension() : string
    {
        return Chord::MINOR;
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
        ];
    }
}
