<?php

namespace App\Models\Scale;

use App\Lookup\Notes;
use App\Models\Note\Note;

abstract class BaseScale
{
    protected $root;
    protected $notes = [];

    protected $useSharps = [];

    public function __construct(string $root)
    {
        $this->root = $root;
        $this->notes = $this->findNotes();
    }

    /**
     * Determine which notes should be in this scale
     *
     * @return array
     */
    private function findNotes() : array
    {
        $notes = [];
        $intervals = str_split($this->getIntervals(),1);
        $currentNote = Note::sharpToFlat($this->root);

        foreach ($intervals as $interval) {
            if (in_array(Note::flatToSharp($this->root), $this->useSharps)) {
                $note = Note::flatToSharp($currentNote);
            } else {
                $note = $currentNote;
            }

            $notes[] = $note;
            $currentNote = $this->getNextNote($currentNote, $interval);
        }

        return $notes;
    }

    /**
     * Use interval to determine which note should come next in the scale
     *
     * @param string $note
     * @param string $interval
     * @return string
     */
    private function getNextNote(string $note, string $interval) : string
    {
        $notes = Notes::ALL;
        $total = count($notes);
        $current = array_search($note, $notes);

        switch ($interval) {
            case 'W':
                $next = $current + 2;
                break;
            case 'H':
                $next = $current + 1;
                break;
        }

        if ($next >= $total) {
            $next -= $total;
        }

        return $notes[$next];
    }

    /**
     * Get notes in this scale
     *
     * @return array
     */
    public function getNotes() : array
    {
        return $this->notes;
    }

    /**
     * Get intervals between each note in the scale.
     * 'W' = whole step
     * 'H' = half step
     *
     * @return string
     */
    abstract protected function getIntervals() : string;

}