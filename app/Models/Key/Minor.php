<?php

namespace App\Models\Key;

use App\Lookup\Chord;
use App\Models\Scale\Minor as MinorScale;

/**
 * Minor Key
 */
class Minor extends BaseKey
{
    /**
     * Constructor
     *
     * @param string $root
     */
    public function __construct(string $root)
    {
        parent::__construct($root);
        $this->tonality = Key::MINOR;
        $this->notes = (new MinorScale($this->root))->getNotes();
        $this->chords = $this->findChords();
    }

    /**
     * @return array
     */
    public function getChordIntervals() : array
    {
        return [
            Chord::MINOR,
            Chord::DIMINISHED,
            Chord::MAJOR,
            Chord::MINOR,
            Chord::MINOR,
            Chord::MAJOR,
            Chord::MAJOR,
        ];
    }
}
