<?php

namespace App\Models\Key;

use App\Models\Chord\Chord;

abstract class BaseKey
{
    protected $root;
    protected $tonality;
    protected $notes = [];
    protected $chords = [];

    public function __construct(string $root)
    {
        $this->root = $root;
    }

    public function getNotes() : array
    {
        return $this->notes;
    }

    public function getChords() : array
    {
        return $this->chords;
    }

    protected function findChords()
    {
        $chords = [];
        $intervals = $this->getChordIntervals();

        for ($i = 0; $i < count($this->notes); $i++) {
            $chords[] = Chord::make($this->notes[$i], $intervals[$i]);
        }

        return $chords;
    }

    abstract public function getChordIntervals() : array;
}