<?php

namespace App\Models\Chord;

use App\Lookup\Notes;
use App\Models\Note\Note;

abstract class BaseChord
{
    protected $root;
    protected $extension;
    protected $notes = [];

    public function __construct(string $root)
    {
        $this->root = $root;
        $this->extension = $this->getExtension();
        $this->notes = $this->findNotes();
    }

    public function getNotes() : array
    {
        return $this->notes;
    }

    public function getName() : string
    {
        return $this->root . ' ' . $this->extension;
    }

    private function findNotes() : array
    {
        $notes = Notes::ALL;
        $total = count($notes);
        $rootIndex = array_search(Note::sharpToFlat($this->root), $notes);
        $chord = [];

        foreach ($this->getIntervals() as $interval) {
            $index = $rootIndex + $interval;

            while ($index >= $total) {
                $index -= $total;
            }

            $chord[] = $notes[$index];
        }

        return $chord;
    }

    abstract public function getExtension() : string;
    abstract protected function getIntervals() : array;
}