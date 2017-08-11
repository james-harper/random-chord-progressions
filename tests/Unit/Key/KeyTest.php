<?php

namespace Tests\Unit\Key;

use App\Exceptions\InvalidKeyException;
use App\Models\Key\Key;
use App\Models\Scale\Chromatic;
use App\Models\Scale\Major;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KeyTest extends TestCase
{
    public function testMajorKey()
    {
        $cMajor = Key::make('C', 'major');
        $expected = ['C', 'D', 'E', 'F', 'G', 'A', 'B'];
        $this->assertEquals($cMajor->getNotes(), $expected);

        $this->assertEquals($cMajor, Key::make('C'));
    }

    public function testMinorKey()
    {
        $aMinor = Key::make('A', 'minor');
        $expected = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
        $this->assertEquals($aMinor->getNotes(), $expected);
    }

    public function testForceSharps()
    {
        $fSharp = Key::make('F#', 'major');
        $gFlat = Key::make('Gb', 'major');
        $this->assertEquals($fSharp->getNotes(), $gFlat->getNotes());

        $eMajor = Key::make('E', 'major');
        $this->assertEquals($eMajor->getNotes(), [
            'E', 'F#', 'G#', 'A', 'B', 'C#', 'D#'
        ]);
    }

    public function testGetChords()
    {
        $cMajor = Key::make('C', 'major');
        $chords = [];

        foreach ($cMajor->getChords() as $chord) {
            $chords[] = $chord->getName();
        }

        $this->assertEquals($chords, [
            'C major',
            'D minor',
            'E minor',
            'F major',
            'G major',
            'A minor',
            'B dim'
        ]);
    }

    public function testInvalidKey()
    {
        $this->expectException(InvalidKeyException::class);
        $key = Key::make('C', 'INVALID');
    }
}
