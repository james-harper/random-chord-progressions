<?php

namespace App\Models\Key;

use App\Exceptions\InvalidKeyException;

/**
 * All chords should extend BaseKey
 */
abstract class Key
{
    const MAJOR = 'major';
    const MINOR = 'minor';

    /**
     * Mapping of key types to classes
     *
     * @var array
     */
    private static $keys = [
        '' => Major::class,
        Key::MAJOR => Major::class,
        Key::MINOR => Minor::class,
    ];

    /**
     * Create a new key instance
     *
     * @param string $root
     * @param string $tonality
     * @throws InvalidKeyException
     * @return BaseKey
     */
    public static function make(string $root, string $tonality = '') : BaseKey
    {
        $tonality = strtolower($tonality);

        if (isset(self::$keys[$tonality])) {
            $class = self::$keys[$tonality];
            return new $class($root);
        }

        throw new InvalidKeyException(
          'Cannot make key: '.$root.' '.$tonality
        );
    }
}
