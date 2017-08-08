<?php

namespace App\Models\Chord;

use App\Lookup\Chord;
use App\Lookup\Interval;

class Diminished extends BaseChord
{
    public function getExtension() : string
    {
        return Chord::DIMINISHED;
    }

    protected function getIntervals() : array
    {
        return [
            Interval::ROOT,
            Interval::MINOR_THIRD,
            Interval::FLAT_FIFTH,
        ];
    }
}