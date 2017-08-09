<?php

namespace App\Models\Progression\Random;

use App\Lookup\Chord;
use App\Models\Chord\BaseChord;
use App\Models\Key\BaseKey;

/**
 * Random Chord Progression
 */
class RandomProgression
{
    /**
     * Bars in the progression
     *
     * @var array
     */
    protected $bars = [];

    /**
     * Chords that can be randomly selected from
     *
     * @var array
     */
    protected $chords = [];

    /**
     * Chord extensions that should not be included in the progression
     *
     * @var array
     */
    protected $excludedExtensions = [Chord::DIMINISHED];

    /**
     * The key that the progression is in
     *
     * @var BaseKey
     */
    protected $key;

    /**
     * Constructor
     *
     * @param BaseKey $key
     * @param int $numBars
     */
    public function __construct(BaseKey $key, int $numBars)
    {
        $this->key = $key;
        $this->generateRandomBars($numBars);
    }

    /**
     * Get chords that can be selected from.
     *
     * @return array
     */
    public function getChords() : array
    {
        if (!empty($this->chords)) {
            return $this->chords;
        }

        $chords = $this->key->getChords();

        return $this->chords = array_values(
            array_filter($chords, function ($chord) {
                return !in_array(
                    $chord->getExtension(), $this->excludedExtensions
                );
            })
        );
    }

    /**
     * Get bars in the progressions
     *
     * @return array
     */
    public function getBars() : array
    {
        return $this->bars;
    }

    /**
     * Add a bar onto the end of the progression
     *
     * @param array $bar
     * @return void
     */
    public function addBar(array $bar) : void
    {
        $this->bars[] = $bar;
    }

    /**
     * Randomly select a chord
     *
     * @return BaseChord
     */
    protected function getRandomChord() : BaseChord
    {
        $chords = $this->getChords();
        $randomIndex = random_int(0, count($chords) - 1);
        return $chords[$randomIndex];
    }

    /**
     * Randomly generate the given number of bars
     *
     * @todo Adjust so that each bar has the possibilty of containing more than one chord
     *
     * @param int $numBars
     * @return void
     */
    protected function generateRandomBars(int $numBars) : void
    {
        for ($i = 0; $i < $numBars; $i++) {
            $chord = ($i === 0) ?
                $this->getChords()[0] : $this->getRandomChord();

            $this->addBar([
                'chords' => [$chord->getName()],
            ]);
        }
    }
}
