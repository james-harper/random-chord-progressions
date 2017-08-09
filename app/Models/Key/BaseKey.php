<?php

namespace App\Models\Key;

use App\Models\Chord\Chord;

/**
 * All keys should extend BaseKey
 */
abstract class BaseKey
{
    /**
     * The root note
     *
     * @var string
     */
    protected $root;

    /**
     * The tonality - eg major/minor
     *
     * @var string
     */
    protected $tonality;

    /**
     * Notes that are in this key
     *
     * @var string[]
     */
    protected $notes = [];

    /**
     * Chords that are in this key
     *
     * @var BaseChord[]
     */
    protected $chords = [];

    /**
     * Constructor
     *
     * @param string $root
     */
    public function __construct(string $root)
    {
        $this->root = $root;
    }

    /**
     * Get notes that are in this key
     *
     * @return string[]
     */
    public function getNotes() : array
    {
        return $this->notes;
    }

    /**
     * Get chords that are in this key
     *
     * @return BaseChord[]
     */
    public function getChords() : array
    {
        return $this->chords;
    }

    /**
     * Determine which chords are in this key,
     * based on the intervals in getChordIntervals()
     *
     * @return array
     */
    protected function findChords() : array
    {
        $chords = [];
        $intervals = $this->getChordIntervals();

        for ($i = 0; $i < count($this->notes); $i++) {
            $chords[] = Chord::make($this->notes[$i], $intervals[$i]);
        }

        return $chords;
    }

    /**
     * What type of chord should go with each note in this key.
     * Eg. [major, minor, minor, etc]
     * Intervals is not the best description - naming things is hard.
     *
     * @return array
     */
    abstract public function getChordIntervals() : array;
}
