<?php

namespace App\Models\Key;

use App\Lookup\Chord;
use App\Models\Scale\Major as MajorScale;

/**
 * Major Key
 */
class Major extends BaseKey
{
    /**
     * Constructor
     *
     * @param string $root
     */
    public function __construct(string $root)
    {
        parent::__construct($root);
        $this->tonality = Key::MAJOR;
        $this->notes = (new MajorScale($this->root))->getNotes();
        $this->chords = $this->findChords();
    }

    /**
     * @return array
     */
    public function getChordIntervals() : array
    {
        return [
            Chord::MAJOR,
            Chord::MINOR,
            Chord::MINOR,
            Chord::MAJOR,
            Chord::MAJOR,
            Chord::MINOR,
            Chord::DIMINISHED,
        ];
    }
}
