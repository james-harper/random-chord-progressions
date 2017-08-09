<?php

namespace App\Models\Key;

/**
 * All chords should extend BaseKey
 */
abstract class Key
{
    const MAJOR = 'major';
    const MINOR = 'minor';

    /**
     * Create a new key instance
     *
     * @param string $root
     * @param string $tonality
     * @return BaseKey
     */
    public static function make(string $root, string $tonality = '') : BaseKey
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
