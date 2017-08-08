<?php

namespace App\Models\Chord;

use App\Lookup\Chord;
use App\Lookup\Interval;

class Minor extends BaseChord
{
    public function getExtension() : string
    {
        return Chord::MINOR;
    }

    protected function getIntervals() : array
    {
        return [
            Interval::ROOT,
            Interval::MINOR_THIRD,
            Interval::FIFTH,
        ];
    }
}