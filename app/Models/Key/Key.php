<?php

namespace App\Models\Key;

abstract class Key
{
    const MAJOR = 'major';
    const MINOR = 'minor';

    /**
     * Return an instance of a key
     * This currently returns the appropriate scale
     * but this may change once chords have been added
     *
     * @param string $root
     * @param string $tonality
     * @return App\Models\Scale\BaseScale
     */
    public static function make(string $root, string $tonality = '')
    {
        $tonality = strtolower($tonality);

        switch ($tonality) {
            case self::MINOR:
                return new Minor($root);
            default:
                return new Major($root);
        }
    }
}