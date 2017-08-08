<?php

namespace App\Models\Chord;

use App\Lookup\Chord as Ext;

abstract class Chord
{
    public static function make(string $root, string $extension = '')
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