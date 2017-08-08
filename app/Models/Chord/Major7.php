<?php

namespace App\Models\Chord;

use App\Lookup\Chord;
use App\Lookup\Interval;

class Major7 extends BaseChord
{
    public function getExtension() : string
    {
        return Chord::MAJOR_7;
    }

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