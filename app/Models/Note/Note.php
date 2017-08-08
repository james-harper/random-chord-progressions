<?php

namespace App\Models\Note;

class Note
{
    const FLAT = 'b';
    const SHARP = '#';

    /**
     * Convert a flat note into the equivalent sharp
     *
     * @param string $note
     * @return string
     */
    public static function flatToSharp(string $note) : string
    {
        if (strlen($note) === 1) {
            return $note;
        }

        if ($note[1] == self::FLAT) {
            $newNote = chr(ord($note[0]) - 1);

            if ($newNote < 'A') {
                $newNote = 'G';
            }

            if (!in_array($newNote, ['B', 'E'])) {
                $newNote .= self::SHARP;
            }

            return $newNote;
        }

        return $note;
    }

    /**
     * Convert a sharp note into the equivalent flat
     *
     * @param string $note
     * @return string
     */
    public static function sharpToFlat(string $note) : string
    {
        if (strlen($note) === 1) {
            return $note;
        }

        if ($note[1] == self::SHARP) {
            $newNote = chr(ord($note[0]) + 1);

            if ($newNote >= 'H') {
                $newNote = 'A';
            }

            if (!in_array($newNote, ['C', 'F'])) {
                $newNote .= self::FLAT;
            }

            return $newNote;
        }

        return $note;
    }
}