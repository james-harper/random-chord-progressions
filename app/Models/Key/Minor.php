<?php

namespace App\Models\Key;

use App\Lookup\Chord;
use App\Models\Scale\Minor as MinorScale;

class Minor extends BaseKey
{
    public function __construct(string $root)
    {
        parent::__construct($root);
        $this->tonality = Key::MINOR;
        $this->notes = (new MinorScale($this->root))->getNotes();
        $this->chords = $this->findChords();
    }

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