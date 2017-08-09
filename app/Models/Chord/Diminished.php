<?php

namespace App\Models\Chord;

use App\Lookup\Chord;
use App\Lookup\Interval;

/**
 * Diminished Chord
 */
class Diminished extends BaseChord
{
    /**
     * @return string
     */
    public function getExtension() : string
    {
        return Chord::DIMINISHED;
    }

    /**
     * @return array
     */
    protected function getIntervals() : array
    {
        return [
            Interval::ROOT,
            Interval::MINOR_THIRD,
            Interval::FLAT_FIFTH,
        ];
    }
}
