<?php

namespace App\Models\Chord;

use App\Lookup\Notes;
use App\Models\Note\Note;

/**
 * Chord classes should extend BaseChord
 */
abstract class BaseChord
{
    /**
     * Root note
     *
     * @var string
     */
    protected $root;

    /**
     * Chord type - eg major/minor
     *
     * Use constants from App\Lookup\Chord
     *
     * @var string
     */
    protected $extension;

    /**
     * The notes that form this chord
     *
     * @var string[]
     */
    protected $notes = [];

    /**
     * Constructor
     *
     * @param string $root
     */
    public function __construct(string $root)
    {
        $this->root = $root;
        $this->extension = $this->getExtension();
        $this->notes = $this->findNotes();
    }

    /**
     * Get the notes that form this chord
     *
     * @return string[]
     */
    public function getNotes() : array
    {
        return $this->notes;
    }

    /**
     * Get the name of this chord
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->root . ' ' . $this->extension;
    }

    /**
     * Determine which notes are in this chord based
     * on the intervals provided in getIntervals()
     *
     * @return array
     */
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

    /**
     * Get the type of chord - eg major/minor
     *
     * Use constants from App\Lookup\Chord
     *
     * @return string
     */
    abstract public function getExtension() : string;

    /**
     * Define the intervals that make up this chord.
     *
     * The root note should be included, and other intervals should be
     * relative to the root.
     *
     * Use constants from App\Lookup\Interval
     *
     * @return array
     */
    abstract protected function getIntervals() : array;
}
