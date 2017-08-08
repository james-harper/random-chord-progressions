<?php

namespace App\Models\Chord;

use App\Lookup\Chord;
use App\Lookup\Interval;

class Minor7 extends BaseChord
{
    public function getExtension() : string
    {
        return Chord::MINOR_7;
    }

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