<?php

namespace App\Models\Chord;

use App\Lookup\Chord;
use App\Lookup\Interval;

class Major extends BaseChord
{
    public function getExtension() : string
    {
        return Chord::MAJOR;
    }

    protected function getIntervals() : array
    {
        return [
            Interval::ROOT,
            Interval::MAJOR_THIRD,
            Interval::FIFTH,
        ];
    }
}