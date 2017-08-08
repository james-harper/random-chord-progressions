<?php

namespace App\Models\Chord;

use App\Lookup\Chord;
use App\Lookup\Interval;

class Seventh extends BaseChord
{
    public function getExtension() : string
    {
        return Chord::SEVENTH;
    }

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