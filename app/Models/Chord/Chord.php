<?php

namespace App\Models\Chord;

use App\Exceptions\InvalidChordException;
use App\Lookup\Chord as Ext;

/**
 * Chord classes should extend BaseChord
 */
abstract class Chord
{
    /**
     * Mapping of chord extensions to chord classes
     *
     * @var array
     */
    private static $chords = [
        '' => Major::class,
        Ext::MAJOR => Major::class,
        Ext::MINOR => Minor::class,
        Ext::MAJOR_7 => Major7::class,
        Ext::MINOR_7 => Minor7::class,
        Ext::SEVENTH => Seventh::class,
        Ext::DIMINISHED => Diminished::class,
    ];

    /**
     * Create a new chord
     *
     * @param string $root
     * @param string $extension
     * @throws InvalidChordException
     * @return BaseChord
     */
    public static function make(string $root, string $extension = '') : BaseChord
    {
        $extension = strtolower($extension);

        if (isset(self::$chords[$extension])) {
            $class = self::$chords[$extension];
            return new $class($root);
        }

        throw new InvalidChordException(
          'Cannot make chord: '.$root.' '.$extension
        );
    }
}
