<?php

namespace App\Models\Key;

use App\Lookup\Chord;
use App\Models\Scale\Major as MajorScale;

class Major extends BaseKey
{
    public function __construct(string $root)
    {
        parent::__construct($root);
        $this->tonality = Key::MAJOR;
        $this->notes = (new MajorScale($this->root))->getNotes();
        $this->chords = $this->findChords();
    }

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