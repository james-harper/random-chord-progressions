<?php

namespace App\Models\Progression\Random;

class RhythmicProgression extends RandomProgression
{
    protected $rhythms = [
        'x---',
        'x-x-',
        'x-------',
        'x-x---x-',
        'x---------------',
        'x---x---x---x-x-',
    ];

    public function addBar(array $bar) : void
    {
        $bar['pattern'] = $this->pickRandomRhymthm();
        parent::addBar($bar);
    }

    protected function pickRandomRhymthm()
    {
        $index = random_int(0, count($this->rhythms) - 1);
        return $this->rhythms[$index];
    }
}