<?php

namespace App\Models\Chord;

use App\Lookup\Chord as Ext;

/**
 * Chord classes should extend BaseChord
 */
abstract class Chord
{
    /**
     * Create a new chord
     *
     * @param string $root
     * @param string $extension
     * @return BaseChord
     */
    public static function make(string $root, string $extension = '') : BaseChord
    {
        $extension = strtolower($extension);

        switch ($extension) {
            case Ext::DIMINISHED:
                return new Diminished($root);
            case Ext::MAJOR_7:
                return new Major7($root);
            case Ext::MINOR:
                return new Minor($root);
            case Ext::MINOR_7:
                return new Minor7($root);
            case Ext::SEVENTH:
                return new Seventh($root);
            default:
                return new Major($root);
        }
    }
}
