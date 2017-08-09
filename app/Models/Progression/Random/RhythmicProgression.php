<?php

namespace App\Models\Progression\Random;

/**
 * Randomly generated chord progression with randomly generated rhythmic
 * patterns to accompany the chords
 */
class RhythmicProgression extends RandomProgression
{
    /**
     * Rhythmic patterns that can be randomly selected from
     *
     * @see https://github.com/james-harper/json-to-guitar-tab#pattern
     *
     * @var string[]
     */
    protected $rhythms = [
        'x---',
        'x-x-',
        'x-------',
        'x-x---x-',
        'x---------------',
        'x---x---x---x-x-',
    ];

    /**
     * Add a bar onto the end of the progression.
     * If a rhythmic pattern has not been specified, then one will
     * be generated.
     *
     * @param array $bar
     * @return void
     */
    public function addBar(array $bar) : void
    {
        if (!isset($bar['pattern'])) {
            $bar['pattern'] = $this->pickRandomRhymthm();
        }

        parent::addBar($bar);
    }

    /**
     * Randomly select a rhythm from $this->rhythms
     *
     * @return string
     */
    protected function pickRandomRhymthm() : string
    {
        $index = random_int(0, count($this->rhythms) - 1);
        return $this->rhythms[$index];
    }
}
